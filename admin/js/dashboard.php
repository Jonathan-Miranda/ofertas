<script>
    const lab = document.getElementById('lab');
    const venta = document.getElementById('vendidos');
    const canje = document.getElementById('canje');

    fetch('src/components/data-venta.php')
        .then(response => response.json())
        .then(data => {
            const labels = data.map(item => item.NOMBRE);
            const ventas = data.map(item => item.total_ventas);

            new Chart(lab, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Ventas',
                        data: ventas,
                        backgroundColor: 'rgba(54, 162, 235, 0.5)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1,
                        borderRadius: 10
                    }]
                },
                options: {
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        })
        .catch(error => console.error('Error obteniendo los datos:', error));




    fetch('src/components/data-productos-venta.php')
        .then(response => response.json())
        .then(data => {
            const labels = data.map(item => item.producto);
            const ventas = data.map(item => item.total_ventas);
            new Chart(venta, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Ventas',
                        data: ventas,
                        borderWidth: 1,
                        borderRadius: 20
                    }]
                },
                options: {
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    indexAxis: 'y',
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        })
        .catch(error => console.error('Error obteniendo los datos:', error));


    fetch('src/components/data-venta-sucursal.php')
        .then(response => response.json())
        .then(data => {
            const sucursal = data.map(item => item.sucursal);
            const ventas = data.map(item => item.total_ventas);
            new Chart(canje, {
                type: 'doughnut',
                data: {
                    labels: sucursal,
                    datasets: [{
                        label: 'Canje',
                        data: ventas,
                        borderWidth: 1,
                        borderRadius: 20
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        })
        .catch(error => console.error('Error obteniendo los datos:', error));
</script>