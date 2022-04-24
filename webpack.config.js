const path = require('path');

module.exports = {
    resolve: {
        alias: {
            '@': path.resolve('resources/js'),
        },
        // modules: [path.resolve(__dirname,'../node_modules')]
    },
};
