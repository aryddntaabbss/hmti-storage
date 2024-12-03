import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig( {
    plugins: [
        laravel( {
            input: [ 'resources/css/app.css', 'resources/js/app.js' ],
            refresh: true,
        } ),
    ],
    optimizeDeps: {
        include: [
            'jquery',           // Menambahkan jQuery
            'datatables.net',    // Menambahkan DataTables
            'datatables.net-dt', // Menambahkan CSS DataTables
        ],
    },
} );
