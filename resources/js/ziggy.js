const Ziggy = {
  url: 'http://online-shop.test',
  port: null,
  defaults: {},
  routes: {
    'debugbar.openhandler': { uri: '_debugbar/open', methods: ['GET', 'HEAD'] },
    'debugbar.clockwork': {
      uri: '_debugbar/clockwork/{id}',
      methods: ['GET', 'HEAD'],
    },
    'debugbar.telescope': {
      uri: '_debugbar/telescope/{id}',
      methods: ['GET', 'HEAD'],
    },
    'debugbar.assets.css': {
      uri: '_debugbar/assets/stylesheets',
      methods: ['GET', 'HEAD'],
    },
    'debugbar.assets.js': {
      uri: '_debugbar/assets/javascript',
      methods: ['GET', 'HEAD'],
    },
    'debugbar.cache.delete': {
      uri: '_debugbar/cache/{key}/{tags?}',
      methods: ['DELETE'],
    },
    'adminlte.darkmode.toggle': {
      uri: 'adminlte/darkmode/toggle',
      methods: ['POST'],
    },
    'orders.index': { uri: 'api/admin/orders', methods: ['GET', 'HEAD'] },
    'orders.show': {
      uri: 'api/admin/orders/{order}',
      methods: ['GET', 'HEAD'],
      bindings: { order: 'id' },
    },
    'orders.update': {
      uri: 'api/admin/orders/{order}',
      methods: ['PUT', 'PATCH'],
      bindings: { order: 'id' },
    },
    'ingredients.index': {
      uri: 'api/admin/ingredients',
      methods: ['GET', 'HEAD'],
    },
    'ingredients.store': { uri: 'api/admin/ingredients', methods: ['POST'] },
    'ingredients.show': {
      uri: 'api/admin/ingredients/{ingredient}',
      methods: ['GET', 'HEAD'],
      bindings: { ingredient: 'id' },
    },
    'ingredients.update': {
      uri: 'api/admin/ingredients/{ingredient}',
      methods: ['PUT', 'PATCH'],
      bindings: { ingredient: 'id' },
    },
    'ingredients.destroy': {
      uri: 'api/admin/ingredients/{ingredient}',
      methods: ['DELETE'],
      bindings: { ingredient: 'id' },
    },
    'products.index': { uri: 'api/admin/products', methods: ['GET', 'HEAD'] },
    'products.store': { uri: 'api/admin/products', methods: ['POST'] },
    'products.show': {
      uri: 'api/admin/products/{product}',
      methods: ['GET', 'HEAD'],
      bindings: { product: 'id' },
    },
    'products.update': {
      uri: 'api/admin/products/{product}',
      methods: ['PUT', 'PATCH'],
      bindings: { product: 'id' },
    },
    'products.destroy': {
      uri: 'api/admin/products/{product}',
      methods: ['DELETE'],
      bindings: { product: 'id' },
    },
    'combos.index': { uri: 'api/admin/combos', methods: ['GET', 'HEAD'] },
    'combos.store': { uri: 'api/admin/combos', methods: ['POST'] },
    'combos.show': {
      uri: 'api/admin/combos/{combo}',
      methods: ['GET', 'HEAD'],
      bindings: { combo: 'id' },
    },
    'combos.update': {
      uri: 'api/admin/combos/{combo}',
      methods: ['PUT', 'PATCH'],
      bindings: { combo: 'id' },
    },
    'combos.destroy': {
      uri: 'api/admin/combos/{combo}',
      methods: ['DELETE'],
      bindings: { combo: 'id' },
    },
    'providers.index': { uri: 'api/admin/providers', methods: ['GET', 'HEAD'] },
    'providers.store': { uri: 'api/admin/providers', methods: ['POST'] },
    'providers.show': {
      uri: 'api/admin/providers/{provider}',
      methods: ['GET', 'HEAD'],
      bindings: { provider: 'id' },
    },
    'providers.update': {
      uri: 'api/admin/providers/{provider}',
      methods: ['PUT', 'PATCH'],
      bindings: { provider: 'id' },
    },
    'providers.destroy': {
      uri: 'api/admin/providers/{provider}',
      methods: ['DELETE'],
      bindings: { provider: 'id' },
    },
    root: { uri: '/', methods: ['GET', 'HEAD'] },
    login: { uri: 'login', methods: ['GET', 'HEAD'] },
    logout: { uri: 'logout', methods: ['POST'] },
    register: { uri: 'register', methods: ['GET', 'HEAD'] },
    'password.request': { uri: 'password/reset', methods: ['GET', 'HEAD'] },
    'password.email': { uri: 'password/email', methods: ['POST'] },
    'password.reset': {
      uri: 'password/reset/{token}',
      methods: ['GET', 'HEAD'],
    },
    'password.update': { uri: 'password/reset', methods: ['POST'] },
    'password.confirm': { uri: 'password/confirm', methods: ['GET', 'HEAD'] },
    home: { uri: 'home', methods: ['GET', 'HEAD'] },
    'admin.index': { uri: 'admin', methods: ['GET', 'HEAD'] },
    'admin.providers': { uri: 'admin/providers', methods: ['GET', 'HEAD'] },
    'admin.orders': { uri: 'admin/orders', methods: ['GET', 'HEAD'] },
    'admin.ingredients': { uri: 'admin/ingredients', methods: ['GET', 'HEAD'] },
    'admin.products': { uri: 'admin/products', methods: ['GET', 'HEAD'] },
    'admin.combos': { uri: 'admin/combos', methods: ['GET', 'HEAD'] },
  },
}

if (typeof window !== 'undefined' && typeof window.Ziggy !== 'undefined') {
  Object.assign(Ziggy.routes, window.Ziggy.routes)
}

export { Ziggy }
