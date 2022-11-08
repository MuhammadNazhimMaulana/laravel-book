import Chart from 'chart.js/auto';

const data = {
    labels: labels,
    datasets: [{
        label: 'Pembelian Buku User',
        backgroundColor: 'rgb(255, 99, 132)',
        borderColor: 'rgb(255, 99, 132)',
        data: trans,
    }]
};

const config = {
    type: 'doughnut',
    data: data,
    options: {}
};

new Chart(
    document.getElementById('transactionChart'),
    config
);