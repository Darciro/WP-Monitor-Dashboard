function initHelpers() {
    $(function () {
        $('[data-toggle="tooltip"]').tooltip();
    })
}

function getSiteData( jsonURL ) {
    $.ajax({
        url: jsonURL,
        xhrFields: {
            withCredentials: true
        },
        beforeSend: function ( xhr ) {
            xhr.setRequestHeader('Authorization', 'Basic ' + btoa('wp-monitor-api:' + WPMonitorAPIKey));
        },
        cache: false,
        dataType: 'json',
        success: function ( data ) {
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
        }
    });
}

function createTableData( jsonURL, target ) {
    $.ajax({
        url: jsonURL,
        xhrFields: {
            withCredentials: true
        },
        beforeSend: function ( xhr ) {
            xhr.setRequestHeader('Authorization', 'Basic ' + btoa('wp-monitor-api:' + WPMonitorAPIKey));
            $(target).append('<tr class="loading-data"><td colspan="2">Carregando</td></tr>');
        },
        cache: false,
        dataType: 'json',
        success: function ( data ) {
            $.each(data, function (i, v) {
                $('.loading-data').remove();

                i = i.replace(/-/g, ' ');

                var tr = '<tr>' +
                    '<td class="text-capitalize">'+ i +'</td>' +
                    '<td>'+ v +'</td>' +
                '</tr>';
                $(target).append(tr);
            })
        }
    });
}

function dynamicColors() {
    var r = Math.floor(Math.random() * 255);
    var g = Math.floor(Math.random() * 255);
    var b = Math.floor(Math.random() * 255);
    return "rgb(" + r + "," + g + "," + b + ")";
}

function getSiteThemes( jsonURL ) {
    $.ajax({
        url: jsonURL,
        xhrFields: {
            withCredentials: true
        },
        beforeSend: function ( xhr ) {
            xhr.setRequestHeader('Authorization', 'Basic ' + btoa('wp-monitor-api:' + WPMonitorAPIKey));
        },
        cache: false,
        dataType: 'json',
        success: function ( data ) {
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
        }
    });
}

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
                backgroundColor: [dynamicColors(), dynamicColors()]
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

function getSitePlugins( jsonURL ) {
    $.ajax({
        url: jsonURL,
        xhrFields: {
            withCredentials: true
        },
        beforeSend: function ( xhr ) {
            xhr.setRequestHeader('Authorization', 'Basic ' + btoa('wp-monitor-api:' + WPMonitorAPIKey));
        },
        cache: false,
        dataType: 'json',
        success: function ( data ) {
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
        }
    });
}

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
                backgroundColor: [dynamicColors(), dynamicColors()]
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

function getSiteUsers( jsonURL ) {
    $.ajax({
        url: jsonURL,
        xhrFields: {
            withCredentials: true
        },
        beforeSend: function ( xhr ) {
            xhr.setRequestHeader('Authorization', 'Basic ' + btoa('wp-monitor-api:' + WPMonitorAPIKey));
        },
        cache: false,
        dataType: 'json',
        success: function ( data ) {
            $('#total-users').text( data.total );
            $.each(data, function (i, v) {
                if( i === 'administrator' ) {
                    $('#admin-users span').text(v);
                }
            });
            drawSiteUsersChart( data );
        }
    });
}


function drawSiteUsersChart( data ) {
    delete data.total;
    var labelsArr = [],
        dataArr = [],
        colorsArr = [];
    $.each(data, function(key, index) {
        labelsArr.push(key);
        dataArr.push(index);
        colorsArr.push( dynamicColors() );
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