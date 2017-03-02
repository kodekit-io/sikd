(function (global, factory) {
    if (typeof define === 'function' && define.amd) {
        define(['./numeral'], factory);
    } else if (typeof module === 'object' && module.exports) {
        factory(require('./numeral'));
    } else {
        factory(global.numeral);
    }
}(this, function (numeral) {
    numeral.register('locale', 'id', {
        delimiters: {
            thousands: '.',
            decimal  : ','
        },
        abbreviations: {
            thousand : 'K',
            million  : 'J',
            billion  : 'M',
            trillion : 'T'
        },
        currency: {
            symbol: 'IDR '
        }
    });
}));