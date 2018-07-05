var feed = new Instafeed({
    get: 'user',
    userId: 855057387, // Ex: 1374300081
    clientId: '80613c9a3c5d4cbeb9bdc66bf708893f',
    accessToken: '855057387.1677ed0.0fd607a32bf143dbb9a7c18c3070c3b8',
    template: '<li><img src="{{image}}"/></li>',
    limit: 6
});
feed.run();