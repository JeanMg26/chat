<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css">
   <title>Usuarios</title>
</head>

<body>

   <div class="container">
      <div class="row mt-5">
         <div class="col-10">
            <div class="card">
               <div class="card-header">Usuarios
               </div>
               <div class="card-body">
                  <ul id="users"></ul>
               </div>
            </div>
         </div>
      </div>
   </div>
   <script src="/js/app.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js"></script>
   <script>
      axios.get('api/users')
                  .then( resp => {
         const usersElement = document.getElementById('users');

         let users = resp.data;

         users.forEach((user, index) => {
            let element = document.createElement('li');

            element.setAttribute('id', user.id);
            element.innerText = user.name;

            usersElement.appendChild(element);
      });
   })
   </script>

   <script>
      Echo.channel('users')
         .listen('UserCreated', (e) => {

            const usersElement = document.getElementById('users');
            let element = document.createElement('li');
            element.setAttribute('id', e.user.id);
            element.innerText = e.user.name;
            usersElement.appendChild(element);
         })
         .listen('UserUpdated', (e) => {

            let element = document.getElementById(e.user.id);
            element.innerText = e.user.name;
         }).listen('UserDeleted', (e) => {

            let element = document.getElementById(e.user.id);
            element.parentNode.removeChild(element);
         });
   </script>



</body>

</html>