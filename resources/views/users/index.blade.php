<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
   <title>Usuarios</title>
</head>

<style>
   .cursor {
      cursor: pointer;
   }
</style>

<body>
   @include('users.navbar')
   <div class="container">
      <div class="row mt-5">
         <div class="col-10">
            <div class="card">
               <div class="card-header">
                  <div class="d-flex justify-content-between align-items-center">
                     <p class="mb-0">Usuarios En linea</p>
                     <p class="mb-0"><i class="fas fa-circle me-2 " id="status{{ auth()->user()->id }}"></i><strong>{{ auth()->user()->name }}</strong></p>
                  </div>

               </div>
               <div class="card-body">
                  <ul id="users" class="list-unstyled"></ul>

               </div>
            </div>
         </div>
      </div>
   </div>
   <script src="{{ asset('js/app.js') }}"></script>
   <script src="{{ asset('js/bootstrap.min.js') }}"></script>


   {{-- <script>
      let authUser;

      axios.get('/auth/user')
         .then( resp => {
            authUser = resp.data.authUser;
            // console.log(authUser);
         })
         .then(() => {
            axios.get('api/users')
                  .then( resp => {
                     const usersElement = document.getElementById('users');
                     const location = window.location.hostname;

                     let users = resp.data;

                     users.forEach((user, index) => {

                        if(user.id != authUser.id){
                           let element = document.createElement('li');
                           let link = document.createElement('a');
                           let icon = document.createElement('i');

                           element.setAttribute('id', user.id);
                           link.setAttribute('id', 'link'+user.id);
                           link.innerText = user.name;
                           link.setAttribute('href', "/chat/with/"+user.id)
                           icon.setAttribute('id', 'status'+user.id);
                           // icon.setAttribute('id', 'status');
                           icon.className = 'fas fa-circle me-2 text-danger';
                           link.prepend(icon);

                           element.appendChild(link);
                           usersElement.appendChild(element);
                        }
                     });
                  });
         });
   </script> --}}

   <script>
      Echo.channel('users')
         .listen('UserCreated', (e) => {

            const usersElement = document.getElementById('users');

            let element = document.createElement('li');
            let link = document.createElement('a');
            let icon = document.createElement('i');

            element.setAttribute('id', e.user.id);
            link.setAttribute('id', 'link'+user.id);
            link.innerText = e.user.name;
            link.setAttribute('href', "/chat/with/"+e.user.id)
            // link.setAttribute('onclick', 'greetUser("' + e.user.id + '")');
            icon.setAttribute('id', 'status'+e.user.id);
            icon.className = 'fas fa-circle me-2 text-danger';
            link.prepend(icon);
            element.appendChild(link);
            usersElement.appendChild(element);
         })
         .listen('UserUpdated', (e) => {

            let link = document.getElementById('link'+e.user.id);
            let icon = document.createElement('i');
            link.innerText = e.user.name;
            icon.setAttribute('id', 'status'+e.user.id);
            icon.className = 'fas fa-circle me-2 text-danger';
            link.prepend(icon);
            // console.log(e.user.name);
            console.log(link);
         })
         .listen('UserDeleted', (e) => {

            let element = document.getElementById(e.user.id);
            element.parentNode.removeChild(element);
         });
   </script>

   <script>
      // Echo.private('notifications')
      //       .listen('UserSessionChanged', (e) => {
      //          // console.log(e.user.id);

      //          let icon = document.getElementById('status'+e.user.id);

      //          icon.classList.remove('text-danger');
      //          icon.classList.remove('text-success');

      //          icon.classList.add('text-'+e.type);
               
      //          // console.log(e.user.id);
      //       });

      let authUser;

      const usersElement = document.getElementById('users');

      axios.get('/auth/user')
         .then( resp => {
            authUser = resp.data.authUser;

            const status =  document.getElementById('status'+authUser.id);
            status.classList.add('text-success')
         })
         .then( () => {

            Echo.join('users')
            .here( (users) => {

               users.forEach( (user, index) => {

                  if(authUser.id != user.id) {
                     let element = document.createElement('li');
                     let link = document.createElement('a');
                     let icon = document.createElement('i');

                     element.setAttribute('id', user.id);
                     link.setAttribute('id', 'link'+user.id);
                     link.innerText = user.name;
                     link.className = 'text-decoration-none cursor';
                     link.setAttribute('onclick', 'window.open("/chat/with/'+user.id+'")');
                     icon.className = 'fas fa-circle me-2 text-success';
                     link.prepend(icon);
                     element.appendChild(link);
                     usersElement.appendChild(element); 
                  }
               });
            })
            .joining( (user) => {
                  let element = document.createElement('li');
                  let link = document.createElement('a');
                  let icon = document.createElement('i');

                  element.setAttribute('id', user.id);
                  link.setAttribute('id', 'link'+user.id);
                  link.innerText = user.name;
                  link.className = 'text-decoration-none cursor';
                     link.setAttribute('onclick', 'window.open("/chat/with/'+user.id+'")');
                  icon.className = 'fas fa-circle me-2 text-success';
                  link.prepend(icon);
                  element.appendChild(link);
                  usersElement.appendChild(element);
               console.log(status);
            })
            .leaving( (user) => {
               let element = document.getElementById(user.id);
               element.parentNode.removeChild(element);
            });
      

         });


         // utils
         function setAttributes(el, attrs) {
            for(var key in attrs) {
               el.setAttribute(key, attrs[key]);
            }
         }






   </script>








   <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.22.0/axios.js"></script>

</body>

</html>