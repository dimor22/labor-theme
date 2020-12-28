(function ($, _) {
    // User Skill Chart
    if ( $('#user-skill-chart').length > 0 ) {
        var ctx = $('#user-skill-chart');
        const options = $('#user-skill-chart').data('options');

        let newLabels = [];
        let newValues = [];

        _.each(options, function (value, key) {
            newLabels.push(key);
            newValues.push(value);
        })
        var chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'radar',
            // The data for our dataset
            data: {
                labels: newLabels,
                datasets: [
                    {
                        label: 'Skill',
                        data: newValues,
                        borderColor: 'orange',
                        backgroundColor: 'rgb(242, 171, 47,0.5)',
                    }
                ]
            },
            options: {
                scale: {
                    ticks: {
                        min: 0,
                        max: 6,
                        stepSize: 1
                    }
                }
            }
        });
    }

    // User Behavior Chart
    if ( $('#user-behavior-chart').length > 0 ) {
        let ctx = $('#user-behavior-chart');
        let bChart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'line',
            // The data for our dataset
            data: {
                labels: ['Dec 19', 'Jan 20', 'Feb 20', 'Mar 20', 'Apr 20', 'May 20', 'Jun 20', 'Jul 20'],
                datasets: [
                    {
                        label: 'Safety',
                        data: [2,3,4,3,1,2,3,4],
                        borderColor: 'orange',
                        backgroundColor: 'transparent',
                    },
                    {
                        label: 'Trust',
                        data: [1,2,5,3,3,2,1,4],
                        borderColor: 'blue',
                        backgroundColor: 'transparent',
                    },
                    {
                        label: 'Leadership',
                        data: [4,5,2,1,4,3,2,1],
                        borderColor: 'green',
                        backgroundColor: 'transparent',
                    },
                    {
                        label: 'Quality',
                        data: [1,2,3,4,5,4,3,2,2],
                        borderColor: 'red',
                        backgroundColor: 'transparent',
                    }
                ]
            },

            // Configuration options go here
            options: {
                scales: {
                    yAxes: [
                        {
                            ticks: {
                                max: 5,
                                min: 1,
                                stepSize: 1
                            }
                        }
                    ]
                },
            }
        });
    }
    
})(jQuery, lodash)

