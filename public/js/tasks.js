var userApplication = new Vue({
  el: '#userApp',
  data: {
  user: {
    "gender": "",
    "email": "",
    "location": "",
      "name":"",
      "dob": {
        "date": "",
        "age": ""
      },
    "picture": {
        "large": "",
        "medium": "",
        "thumbnail": ""
       },
  }
},

methods: {
  fetchUser () {
    fetch('https://randomuser.me/api')
    .then( response => response.json() )

    // ^ This is the same as .then( function(response) {return response.json()} )
    .then( json => {

      userApplication.user.picture.medium = json.results[0].picture.medium;
      userApplication.user.gender = json.results[0].gender;
      userApplication.user.email = json.results[0].email;
      userApplication.user.location = json.results[0].location.street + "" + json.results[0].location.city+ "," +json.results[0].location.state +", " + json.results[0].location.postcode;
      userApplication.user.location.street= json.results[0].location.street;
      userApplication.user.location.city= json.results[0].location.city;
      userApplication.user.location.state = json.results[0].location.state;
      userApplication.user.location.postcode = json.results[0].location.postcode;
      userApplication.user.name= json.results[0].name.first + " " + json.results[0].name.last;
      userApplication.user.name.last = json.results[0].name.last;
      userApplication.user.dob.date = json.results[0].dob.date;
      userApplication.user.dob.age = json.results[0].dob.age;
      console.log(userApplication.user.name);
    } )
    .catch( err => {
      console.log('TASK FETCH ERROR:');
      console.log(err);
    })
  },
  pretty_date: function (d) {
    return moment(d).format('l')
  }
},

created () {
  this.fetchUser();
},

computed: {
 age : function () {
  return moment().diff(this.user.dob.date, 'years')
},
pretty_birthdate: function(){
  return this.pretty_date(this.user.dob.date)
}
},

});
