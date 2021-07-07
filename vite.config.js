import vue from '@vitejs/plugin-vue';

export default ({ command }) => ({
    base: command === 'serve' ? '' : '/build/',
    publicDir: 'fake_dir_so_nothing_gets_copied',
    resolve: {
        alias: {
            'vue': 'vue/dist/vue.esm-bundler.js'
        }
    },
    server: {
        port: 3002
    },
    build: {
        manifest: true,
        outDir: 'public/build',
        rollupOptions: {
            input: {
                app: 'resources/js/bundles/app.js',
                partial: 'resources/js/bundles/partial.js',
            }
        },
    },
    plugins: [
        vue(),
        {
            name: 'blade',
            handleHotUpdate({ file, server }) {
                if (file.endsWith('.blade.php')) {
                    server.ws.send({
                        type: 'full-reload',
                        path: '*',
                    });
                }
            },
        }
    ],
});