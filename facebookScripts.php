<script type="text/javascript">
//loads and initialize the SDK of facebook
(function (d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) { return; }
    js = d.createElement(s); js.id = id;
    js.src = "https://connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

/*
    Things to do:

    -payment method
    -redirect user if connected to course page 
    -start developing the course page

*/
var person = { userID: "", name: "", accessToken: "", picture: "", email: ""};

function logIn() {
    FB.login(function (response) {
        if (response.status == "connected") {
            person.userID = response.authResponse.userID;
            person.accessToken = response.authResponse.accessToken;

            FB.api('/me?fields=id,name,email,picture.type(large)', function (userData) {
                person.name = userData.name;
                person.email = userData.email;
                person.picture = userData.picture.data.url;
                console.log(person.name, ": haha : ", person.email);
                // $.ajax({
                //    url: "index.html",
                //    method: "POST",
                //    data: person,
                //    dataType: 'text',
                //    success: function (serverResponse) {
                //        console.log(person);
                //        //if (serverResponse == "success")
                //            //window.location = "index.php";
                //    }
                // });
            });
        }
    }, {scope: 'public_profile, email'})
}

window.fbAsyncInit = function () {
    FB.init({
        appId: '1686727554790401',
        cookie: true,
        xfbml: true,
        version: 'v3.1'
    });

    FB.AppEvents.logPageView();

};


function makeAccount() {
    window.location.href = ("http://facebook.com");// redirect top facebook page to make account
}

function request(){
    //send email to Mr.Erietta?
    // FB.login(function(response) {
    //     if (response.authResponse) {
    //      console.log('Welcome!  Fetching your information.... ');
    //      FB.api('/me', function(response) {
    //        console.log('Good to see you, ' + response.name + '.');
    //      });
    //     } else {
    //      console.log('User cancelled login or did not fully authorize.');
    //     }
    // });
    $.ajax({
        type: 'POST',
        url: 'https://mandrillapp.com/api/1.0/messages/send.json',
        data: {
          'key': 'fc9c2ef5f2b757e7c0510ea82560c3e6-us19',
          'message': {
            'from_email': email,
            'to': [
                {
                  'email': 'mbarr241@fiu.edu',
                  'name': 'Theus Barros',
                  'type': 'to'
                }
              ],
            'autotext': 'true',
            'subject': 'It seems that it worked',
            'html': 'hello hello, jovem'
          }
        }
       }).done(function(response) {
         console.log(response); // if you're into that sorta thing
       });

    // $.ajax({
    //     type: “POST”,
    //     url: “https://mandrillapp.com/api/1.0/messages/send.json”,
    //     data: {
    //       ‘key’: ‘YOUR API KEY HERE’,
    //       ‘message’: {
    //         ‘from_email’: ‘YOUR@EMAIL.HERE’,
    //         ‘to’: [
    //             {
    //               ‘email’: ‘RECIPIENT_NO_1@EMAIL.HERE’,
    //               ‘name’: ‘RECIPIENT NAME (OPTIONAL)’,
    //               ‘type’: ‘to’
    //             },
    //             {
    //               ‘email’: ‘RECIPIENT_NO_2@EMAIL.HERE’,
    //               ‘name’: ‘ANOTHER RECIPIENT NAME (OPTIONAL)’,
    //               ‘type’: ‘to’
    //             }
    //           ],
    //         ‘autotext’: ‘true’,
    //         ‘subject’: ‘YOUR SUBJECT HERE!’,
    //         ‘html’: ‘YOUR EMAIL CONTENT HERE! YOU CAN USE HTML!’
    //       }
    //     }
    //    }).done(function(response) {
    //      console.log(response); // if you're into that sorta thing
    //    });

    console.log("Request sent");
}

</script>
