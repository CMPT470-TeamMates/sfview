module.exports = {
    "env": {
        "browser": true,
        "es6": true,
        "mocha": true
    },
    "plugins": ["mocha"],
    "extends": "eslint:recommended",
    "parserOptions": {
        "sourceType": "module"
    },
    "rules": {
        "indent": [
            "warn",
            2
        ],
        "quotes": [
            "warn",
            "single"
        ],
        "semi": [
            "warn",
            "always"
        ],
        "no-unused-vars": [
            "warn"
        ],
        "max-len": [
            "warn",
            120
        ]
    }
};
