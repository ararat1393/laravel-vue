'use strict'
const merge = require('webpack-merge')
const prodEnv = require('./prod.env')

module.exports = merge(prodEnv, {
  NODE_ENV: '"development"',
  BACKEND_URL: '"http://localhost:8000/api/"',

  PUSHER_APP_ID:'"889407"',
  PUSHER_APP_KEY:'"9d05fdb3dc7529face03"',
  PUSHER_APP_SECRET:'"f32d59ec1b7db9e5e6ca"',
  PUSHER_APP_CLUSTER:'"mt1"'
})
