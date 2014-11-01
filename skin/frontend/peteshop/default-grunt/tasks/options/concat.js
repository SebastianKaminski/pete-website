module.exports = {
    core: {
        src: [
            'js/global.js'
        ],
        dest: 'js/build/production.js'
    },
    home: {
        src: [
            'js/home.js'
        ],
        dest: 'js/build/home.js'
    },
    category: {
        src: [
            'js/category.js'
        ],
        dest: 'js/build/category.js'
    },
    product: {
        src: [
            'js/product.js',
            'node_modules/jquery-ui/jquery-ui.js'
        ],
        dest: 'js/build/product.js'
    },
    bootstrap: {
        src: [
            'node_modules/bootstrap/dist/js/bootstrap.js'
        ],
        dest: 'js/build/bootstrap.js'
    },
    global: {
        src: [
            'js/global.js'
        ],
        dest: 'js/build/global.js'
    }
}
