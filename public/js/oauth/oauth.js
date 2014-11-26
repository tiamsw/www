function Oauth() {
    this.init();
}

Oauth.prototype.googleClientId = "1023096353620.apps.googleusercontent.com";
Oauth.prototype.googleApiKey = "AIzaSyDp0bqNPcrWPG_3NdIiG6AWCoULvgl-R5w";
Oauth.prototype.googleScopes = 'https://www.googleapis.com/auth/userinfo.email';  
Oauth.prototype.user = {};

Oauth.prototype.desc = "";

/**初始化一些事件, 或者加载页面*/
Oauth.prototype.init = function() {
    var that = this;
    Oauth.prototype.checkFbHashLogin();
    $('table.bor-none td .btn-blue').click(function(event){
        event.stopPropagation();
        Oauth.prototype.facebookLogin();
    });
    
    $('table.bor-none td .btn-lc').click(function(event){
        event.stopPropagation();
        Oauth.prototype.handleAuthClick();
    });
};

/**Facebook 认证 start*/
Oauth.prototype.facebookLogin = function(){//访问令牌
    var appID = '155660824640623';
    var path = 'https://www.facebook.com/dialog/oauth?';
    var queryParams = ['client_id=' + appID,
    'redirect_uri=' + 'http://search4gigs.com/login',
    'scope=' + 'email,read_stream',
    'response_type=token'];
    var query = queryParams.join('&');
    var url = path + query;
    window.location.replace(url);
};

Oauth.prototype.checkFbHashLogin = function() {//检查和使用令牌
    if (window.location.hash.length > 3) {
        var hash = window.location.hash.substring(1);
        if(hash.split('=')[0] == 'access_token'){
            var path = "https://graph.facebook.com/me?";
            var queryParams = [hash, 'callback=displayUser'];
            var query = queryParams.join('&');
            var url = path + query;
            
            var script = document.createElement('script');
            script.src = url;
            document.body.appendChild(script);
        }
    }
};
function displayUser(user) {//回调函数，用户信息转化
    setTimeout(function () { }, 1000);
    if (user.id != null && user.id != "undefined") {
    	console.log(user);
    	Oauth.prototype.desc = "facebook";
    	Oauth.prototype.login_search4gigs(user);
    }else {
        alert('user error');
    }
}

Oauth.prototype.login_search4gigs = function(user) {//Facebook 认证成功之后的处理
	$.ajax({
		   type: "POST",
		   url: "/register/addUser4FaceBook",
		   data: { "userid": user.id, "username": user.username, "firstname": user.first_name, "lastname": user.last_name, "email": user.email, "birthdate": "", "desc": Oauth.prototype.desc},
		   error: {},
		   async: false,
		   cache: false,
		   success: function(json){
			   console.log(json);
			   if(json.trim()=='OK'){
				   window.location.href = "/index";
			    }else{
			    	 alert("登陆失败!");
			    }
		   }
	});
};

/**Facebook 认证 end*/


/**google 认证 start*/
Oauth.prototype.handleClientLoad = function() {//设置google api key
    gapi.client.setApiKey(Oauth.prototype.googleApiKey);
}
  

Oauth.prototype.handleAuthResult = function(authResult) {//授权的结果
    if (authResult && !authResult.error) {
    	Oauth.prototype.makeApiCall();
    } 
}
   

Oauth.prototype.handleAuthClick = function(event) { gapi.auth.authorize({ client_id: Oauth.prototype.googleClientId, //点击页面的登陆按钮触发事件
            scope: Oauth.prototype.googleScopes, immediate: false }, Oauth.prototype.handleAuthResult);
    return false;
}
  

Oauth.prototype.makeApiCall = function() {// 回调函数，处理请求
    gapi.client.load('plus', 'v1', function () {
        var request = gapi.client.plus.people.get({
            'userId': 'me'
        });
  
        request.execute(function (resp) {
        	Oauth.prototype.user.id = resp.id;
        	Oauth.prototype.user.username = resp.displayName;
        	Oauth.prototype.user.first_name = resp.name.familyName;
        	Oauth.prototype.user.lastname = resp.name.givenName;
        	Oauth.prototype.user.birthdate = "";
        	gapi.client.load('oauth2', 'v2', function() {
          	  gapi.client.oauth2.userinfo.get().execute(function(resp) {
          	    Oauth.prototype.user.email = resp.email;
          	    if (Oauth.prototype.user.id != null && Oauth.prototype.user.id != "undefined") {
          	    	Oauth.prototype.desc = "google";
          	    	Oauth.prototype.login_search4gigs(Oauth.prototype.user);
          	    }else {
          	        alert('user error');
          	    }
          	    
          	  })
          	});
        	
        });
    });
}
/**google 认证 end*/

$(function() {
    var oauth = new Oauth();
});

String.prototype.trim = function(){
    return this.replace(/(^\s*)|(\s*$)/g, "");
};