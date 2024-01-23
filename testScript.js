import * as functions from './script';

const scriptFunctions = require('./script');
document.body.onresize = function() { scriptFunctions.zoomwait() };
document.body.onLoad = scriptFunctions.refresh();
