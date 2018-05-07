/**
 * Init some var to use on global scope
 *
 */
var apiURL;

(function ($) {
    $(document).ready(function() {
        // Return false if monitor widgets are not found, just to prevent some bugs
        if( !$('#monitor-area').length )
            return;

        /**
         * Set our base api url and start the application
         *
         */
        apiURL = {
            serverInfo : WPMonitorSiteBaseURL + '/wp-json/wp-monitor-api/v1/server/info',
            siteInfo : WPMonitorSiteBaseURL + '/wp-json/wp-monitor-api/v1/site/info',
            siteThemes : WPMonitorSiteBaseURL + '/wp-json/wp-monitor-api/v1/site/themes',
            sitePlugins : WPMonitorSiteBaseURL + '/wp-json/wp-monitor-api/v1/site/plugins',
            siteUsers : WPMonitorSiteBaseURL + '/wp-json/wp-monitor-api/v1/site/users'
        };

        // Init the dashboard app
        dashboard.init();
    });

    var dashboard = {
        init: function() {
            this.loading();
        },

        /**
         * Get all the data from site and load on screen
         *
         */
        loading: function () {

            $.when(
                this.getDataPromise(apiURL.serverInfo),
                this.getDataPromise(apiURL.siteInfo),
                this.getDataPromise(apiURL.siteThemes),
                this.getDataPromise(apiURL.sitePlugins),
                this.getDataPromise(apiURL.siteUsers)
            ).then(function (
                serverData,
                siteData,
                siteThemesData,
                sitePluginsData,
                siteUsersData
            ) {
                /*
                console.table( serverData[0] );
                console.table( siteData[0] );
                console.table( siteThemesData[0] );
                console.table( sitePluginsData[0] );
                console.table( siteUsersData[0] ); */

                dashboard.renderServerInfo( serverData[0] );
                dashboard.renderGeneralInfo( siteData[0] );
                dashboard.renderThemesInfo( siteThemesData[0] );
                dashboard.renderPluginsInfo( sitePluginsData[0] );
                dashboard.renderUsersInfo( siteUsersData[0] );

                $('#loading-monitor').addClass('hidden');
                $('#monitor-area').removeClass('hidden');
            }).fail (function ( error ) {
                console.error(error);

                $('#loading-monitor').addClass('hidden');
                $('#loading-monitor-error').removeClass('hidden');

                return;
            })
        },

        /**
         * Default API call to get data from site
         *
         * @param apiURL
         * @returns {promise}
         */
        getDataPromise: function ( apiURL ) {
            return $.ajax({
                url: apiURL,
                xhrFields: {
                    withCredentials: true
                },
                beforeSend: function ( xhr ) {
                    xhr.setRequestHeader('Authorization', 'Basic ' + btoa('wp-monitor-api:' + WPMonitorAPIKey));
                },
                cache: true,
                dataType: 'json'
            });
        },

        /**
         * Render table related to server information
         *
         * @param data
         */
        renderServerInfo: function ( data ) {
            $.each(data, function (i, v) {
                $('.loading-data').remove();

                i = i.replace(/-/g, ' ');

                var tr = '<tr>' +
                    '<td class="text-capitalize">'+ i +'</td>' +
                    '<td>'+ v +'</td>' +
                    '</tr>';
                $('#card-server-info table tbody').append(tr);
            })
        },

        /**
         * Render site information
         *
         * @param data
         */
        renderGeneralInfo: function ( data ) {
            $('#site-name').text( data['site-name'] );
            $('#site-url').attr( 'href', data['site-url'] ).text( data['site-url'] );
            $('#admin-email').attr( 'href', 'mailto:' + data['admin-email'] ).text( data['admin-email'] );
            $('#wordpress-version').text( data['core-version'] );
            if( data['core-updates'].length ){
                $('#has-update').removeClass('hidden');
            } else {
                $('#has-update').addClass('hidden');
            }
            $('#is-multisite').text( data['is-multisite'] ? 'Sim' : 'Não' );
        },

        /**
         * Render table and chart related to themes information
         *
         * @param data
         */
        renderThemesInfo: function ( data ) {
            $('#installed-themes').text( Object.keys(data).length );

            var wpThemes = Object.keys(data).length,
                wpThemesHasUpdate = 0;

            Object.keys(data).map(function( key ) {
                if( data[key]['has-update'] === true ){
                    wpThemesHasUpdate++;
                }
            });

            if( wpThemesHasUpdate >= 0 ){
                $('#themes-with-update').removeClass('hidden').find('span').text(wpThemesHasUpdate);
            }

            drawSiteThemesChart( data, wpThemes, wpThemesHasUpdate );
            drawSiteThemesTable( data );

            function drawSiteThemesChart( data, wpThemes, wpThemesHasUpdate ) {
                var ctx = document.getElementById("themes-installed").getContext('2d'),
                    myChart = new Chart(ctx, {
                        type: 'doughnut',
                        data: {
                            labels: [
                                'Temas atualizados',
                                'Temas com atualizações pendentes'
                            ],
                            datasets: [{
                                data: [wpThemes, wpThemesHasUpdate],
                                backgroundColor: [dashboard.dynamicColors(), dashboard.dynamicColors()]
                            }]
                        },
                        options: {
                            responsive: true,
                            legend: {
                                display: false
                            }
                        }
                    });
            }

            function drawSiteThemesTable( data ) {
                var $table = $('#card-site-themes'),
                    i = 1;

                $.each(data, function (slug, theme) {
                    var themeHasUpdate = theme['has-update'];
                    var hasUpdateIcon = ( themeHasUpdate ) ? '<small style="margin-left: 5px;"><span class="glyphicon glyphicon-info-sign" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Atualização disponível"></span></small>' : '';
                    var tr = '<tr>' +
                        '<td class="min-col">'+ i +'</td>' +
                        '<td><b><a href="' + theme['theme-uri'] + '" target="_blank">'+ theme.name + '</a></b><br><small>(' + slug + ')</small>' + '</td>' +
                        '<td><a href="' + theme['author-uri'] + '" target="_blank">'+ theme.author +'</a></td>' +
                        '<td>'+ theme.version + hasUpdateIcon +'</td>' +
                        '</tr>';

                    $table.find('tbody').append(tr);
                    i++;
                });

                $('[data-toggle="tooltip"]').tooltip();
            }

        },

        /**
         * Render table and chart related to plugins information
         *
         * @param data
         */
        renderPluginsInfo: function ( data ) {
            $('#installed-plugins').text( Object.keys(data).length );

            var wpPlugins = Object.keys(data).length,
                wpPluginsHasUpdate = 0;
            Object.keys(data).map(function( key ) {
                if( data[key]['has-update'] === true ){
                    wpPluginsHasUpdate++;
                }
            });

            if( wpPluginsHasUpdate >= 0 ){
                $('#plugins-with-update').removeClass('hidden').find('span').text(wpPluginsHasUpdate);
            }

            drawSitePluginsChart( data, wpPlugins, wpPluginsHasUpdate );
            drawSitePluginsTable( data );

            function drawSitePluginsChart( data, wpPlugins, wpPluginsHasUpdate ) {
                var ctx = document.getElementById("plugins-installed").getContext('2d'),
                    myChart = new Chart(ctx, {
                        type: 'doughnut',
                        data: {
                            labels: [
                                'Temas atualizados',
                                'Temas com atualizações pendentes'
                            ],
                            datasets: [{
                                data: [wpPlugins, wpPluginsHasUpdate],
                                backgroundColor: [dashboard.dynamicColors(), dashboard.dynamicColors()]
                            }]
                        },
                        options: {
                            responsive: true,
                            legend: {
                                display: false
                            }
                        }
                    });
            }

            function drawSitePluginsTable( data ) {
                var $table = $('#card-site-plugins'),
                    i = 1;
                $.each(data, function (slug, plugin) {
                    var pluginHasUpdate = plugin['has-update'];
                    var hasUpdateIcon = ( pluginHasUpdate ) ? '<small style="margin-left: 5px;"><span class="glyphicon glyphicon-info-sign" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Atualização disponível"></span></small>' : '';
                    var tr = '<tr>' +
                        '<td class="min-col">'+ i +'</td>' +
                        '<td><b><a href="' + plugin.PluginURI + '" target="_blank">'+ plugin.Title + '</a></b><br><small>(' + slug + ')</small>' + '</td>' +
                        '<td><a href="' + plugin.AuthorURI + '" target="_blank">'+ plugin.Author +'</a></td>' +
                        '<td>'+ plugin.Version + hasUpdateIcon +'</td>' +
                        '<td>'+ plugin.Description +'</td>' +
                        '</tr>';

                    $table.find('tbody').append(tr);
                    i++;
                });

                $('[data-toggle="tooltip"]').tooltip();
            }
        },

        /**
         * Render user's information on chart
         *
         * @param data
         */
        renderUsersInfo: function ( data ) {
            $('#total-users').text( data.total );
            $.each(data, function (i, v) {
                if( i === 'administrator' ) {
                    $('#admin-users span').text(v);
                }
            });

            drawSiteUsersChart( data );
            function drawSiteUsersChart( data ) {
                delete data.total;
                var labelsArr = [],
                    dataArr = [],
                    colorsArr = [];
                $.each(data, function(key, index) {
                    labelsArr.push(key);
                    dataArr.push(index);
                    colorsArr.push( dashboard.dynamicColors() );
                });

                var ctx = document.getElementById("registered-users").getContext('2d'),
                    myChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: labelsArr,
                            datasets: [{
                                data: dataArr,
                                backgroundColor: colorsArr
                            }]
                        },
                        options: {
                            responsive: true,
                            legend: {
                                display: false
                            },
                            scales: {
                                xAxes: [{
                                    display: false,
                                    categoryPercentage: 1.0,
                                    barPercentage: 1.0,
                                    scaleLabel: {
                                        display: false,
                                        labelString: 'probability'
                                    }
                                }],
                                yAxes: [{
                                    categoryPercentage: 1.0,
                                    barPercentage: 1.0,
                                    scaleLabel: {
                                        display: false,
                                        labelString: 'probability'
                                    },
                                    ticks: {
                                        min: 0,
                                        beginAtZero: true
                                    }
                                }]
                            }
                        }

                    });
            }
        },

        /**
         * Return some random colors to use on charts
         *
         * @returns {string}
         */
        dynamicColors: function () {
            var r = Math.floor(Math.random() * 255);
            var g = Math.floor(Math.random() * 255);
            var b = Math.floor(Math.random() * 255);
            return "rgb(" + r + "," + g + "," + b + ")";
        }
    }
})(jQuery);