var merge = require('webpack-merge')
var prodEnv = require('./prod.env')

module.exports = merge(prodEnv, {
  NODE_ENV: '"development"',
  API: '"http://dylanspurgin.server:8989"',
  STRIPE_KEY: '"pk_test_yaZ6bQuozGp3byM4ujY3MTFQ"'
})
