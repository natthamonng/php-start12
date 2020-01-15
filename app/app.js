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
      <div class="posts-list">
        <h2 class="page-title">Posts List</h2>
        <ul>${postsElement}</ul>
      </div>
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

// Event binding to open posts in list
document.addEventListener('click', (event) => {
  const $target = event.target;
  if($target.classList.contains('btn-open')){
    const postId = Number($target.getAttribute('data-post-id'));
    displayPostDetail(postId)
  }
})

const displayPostDetail = (postId) => {
  const post = postsDataArray[postId];
  //classList.remove('hidden')
  document.querySelector('.posts-list').classList.add('hidden')
  $main.innerHTML +=
  `
  <div class="post-detail">
    <h2 class="page-title">Post Detail</h2>
    <h3 data-post-id="${postId}">${post.title}</h3>
    <p class="post-body">${post.body}</p>
    <button class="btn btn-submit btn-back">Back to Posts List Page</button>
  </div>
  `
}

document.addEventListener('click', (event) => {
  const $target = event.target;
  if($target.classList.contains('btn-back')){
    const $postDetailToRemove = document.querySelector('.post-detail');
    $postDetailToRemove.parentElement.removeChild($postDetailToRemove);
    document.querySelector('.posts-list').classList.remove('hidden')
  }
})

// const displayPostDetail = (post) => {
//     $main.innerHTML = `
//       <div class="post-detail">
//         <h2 class="page-title">Post Detail</h2>
//         <h3>${post.title}</h3>
//         <p>${post.body}</p>
//       </div>
//     `
//   }
  
// // Event binding to open posts in list
// document.addEventListener('click', (event) => {
//   const $target = event.target;
//   if($target.classList.contains('btn-open')){
//     const postId = Number($target.getAttribute('data-post-id'));
//     displayPostDetail(postsDataArray[postId])
//   }
// })