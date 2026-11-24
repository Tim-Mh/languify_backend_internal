{{-- Chart.js plus the chart styles shared by the report pages (Subscriptions, Gem Purchases,
     Family Plans), matching the dashboard: brand colour, Nunito, light gridlines.
     Pages call window.reportCharts.bars(...) and .doughnut(...) from their own scripts. --}}
@once
    @push('scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.umd.min.js"></script>
        <script>
            (() => {
                Chart.defaults.font.family = 'Nunito, system-ui, sans-serif';
                Chart.defaults.color = '#6b7280';

                const dollars = (v) => '$' + Number(v).toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
                const plural = (n, word) => `${n} ${word}${n === 1 ? '' : 's'}`;
                const narrow = () => window.matchMedia('(max-width: 640px)').matches;

                window.reportCharts = {
                    dollars,
                    plural,
                    palette: ['#9e1a69', '#8b5cf6', '#0284c7', '#ea580c', '#059669', '#e878bb', '#f59e0b', '#64748b'],

                    /*
                     * A bar per day or month. money: values are dollars. extra(i) adds a
                     * second tooltip line (such as how many payments made up the bar).
                     */
                    bars(canvas, { labels, values, label, color = '#9e1a69', money = false, titles, extra, axisTitle }) {
                        return new Chart(canvas, {
                            type: 'bar',
                            data: { labels, datasets: [{ label, data: values, backgroundColor: color, hoverBackgroundColor: color + 'cc', borderRadius: 4, maxBarThickness: 36 }] },
                            options: {
                                maintainAspectRatio: false,
                                interaction: { mode: 'index', intersect: false },
                                plugins: {
                                    legend: { display: false },
                                    tooltip: {
                                        callbacks: {
                                            title: (items) => titles ? titles[items[0].dataIndex] : items[0].label,
                                            label: (c) => money ? `${label}: ${dollars(c.parsed.y)}` : `${label}: ${c.parsed.y}`,
                                            afterLabel: (c) => extra ? extra(c.dataIndex) : '',
                                        },
                                    },
                                },
                                scales: {
                                    x: { grid: { display: false }, ticks: { autoSkip: true, maxRotation: 0, maxTicksLimit: narrow() ? 6 : 16 } },
                                    y: {
                                        beginAtZero: true,
                                        grid: { color: '#f3f4f6' },
                                        border: { display: false },
                                        title: axisTitle ? { display: !narrow(), text: axisTitle, font: { weight: 'bold' } } : undefined,
                                        ticks: { precision: 0, maxTicksLimit: 6, callback: money ? (v) => '$' + Number(v).toLocaleString('en-US') : undefined },
                                    },
                                },
                            },
                        });
                    },

                    /* Share of a total. rows: [{ label, cents, payments }]. noun names what payments counts. */
                    doughnut(canvas, rows, colors, noun = 'payment') {
                        const total = rows.reduce((sum, r) => sum + r.cents, 0) || 1;
                        return new Chart(canvas, {
                            type: 'doughnut',
                            data: { labels: rows.map((r) => r.label), datasets: [{ data: rows.map((r) => r.cents / 100), backgroundColor: colors, borderColor: '#fff', borderWidth: 2, hoverOffset: 6 }] },
                            options: {
                                maintainAspectRatio: false,
                                cutout: '62%',
                                plugins: {
                                    legend: { display: false },
                                    tooltip: {
                                        callbacks: {
                                            label: (c) => `${dollars(c.parsed)} (${Math.round(rows[c.dataIndex].cents / total * 100)}%)`,
                                            afterLabel: (c) => plural(rows[c.dataIndex].payments, noun),
                                        },
                                    },
                                },
                            },
                        });
                    },
                };
            })();
        </script>
    @endpush
@endonce
