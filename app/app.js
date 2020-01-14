const $main = document.querySelector('main');
const $form = document.querySelector('form');
const $username = document.querySelector('input[name="username"]');
const $password = document.querySelector('input[name="password"]');

let postsDataArray = [];

$form.addEventListener('submit', (evt) => {
  evt.preventDefault();
  // Récupérer les valeurs du formulaire
  const data = {
    username: $username.value,
    password: $password.value
  };

  // Envoi de la requete de connexion au serveur
  fetch('http://localhost/php-start12/api/login.php', {
      method: "POST",
      body: JSON.stringify(data)
    })
    .then(res => res.json())
    .then(data => {
      // Lecture de la réponse
      if(data && data.success){
        getPostsDataPromise()
          .then((postsData) =>
            updatePostsListView(postsData)
          )
        
      }else{
        // Mauvais login
        alert("Username or password is incorrect.");
        $username.value = ""
        $password.value = ""
      }
  });

  const getPostsDataPromise = () => {
    return fetch('http://localhost/php-start12/api/posts.php')
      .then(res => res.json())
      .then(postsData => {
        return postsDataArray = postsData
        
    }).catch(err => handleError(err));
  };

  const updatePostsListView = (postsData) => {
    let postsElement = postsData.map((post, idx) => 
      createPostItem(post, idx)).join('')
    
    $main.innerHTML = `
      <header>
        <h1>Posts List</h1>
      </header>
      <ul>${postsElement}</ul>
    `
  };

  const createPostItem = (post, postIndex) => {
    return `
    <li>
      <h3><a class="btn-open" data-post-id="${postIndex}">${post.title}</a></h3>
    </li>
  `
  };

});

const displayPostDetail = (post) => {
    $main.innerHTML = `
      <header>
        <h1>Post Detail</h1>
      </header>
      <h1>${post.title}</h1>
      <p>${post.body}</p>
    `
  }
  
// Event binding to open posts in list
document.addEventListener('click', (ev) => {
  const $target = ev.target;
  if($target.classList.contains('btn-open')){
    const postId = Number($target.getAttribute('data-post-id'));
    displayPostDetail(postsDataArray[postId])
  }
})