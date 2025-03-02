/* post-interactions.js
--------------------------------------
Performs the following actions:
- deleting of a post
- confirmation pop up on delete
- toggles the like and dislike button on a post
-------------------------------------- */

const deletePostButton = document.getElementById("delete-post-button");
deletePostButton.addEventListener("click", ()=> deletePost());
    
function deletePost(){
  const confirmDelete = confirm("Are you sure you want to delete this post?");
  if (confirmDelete) {
    window.location.href = "profile.php"; 
  }
}


const likeButton = document.getElementById('like-button');
const unlikeButton = document.getElementById('unlike-button');

unlikeButton.addEventListener('click', () => {
  unlikeButton.style.display = 'none';
  likeButton.style.display = 'inline-block';
});

likeButton.addEventListener('click', () => {
  likeButton.style.display = 'none';
  unlikeButton.style.display = 'inline-block';
});

const saveButton = document.getElementById('save-post-button');
const unsaveButton = document.getElementById('unsave-post-button');

unsaveButton.addEventListener('click', () => {
  unsaveButton.style.display = 'none';
  saveButton.style.display = 'inline-block';
});

saveButton.addEventListener('click', () => {
  saveButton.style.display = 'none';
  unsaveButton.style.display = 'inline-block';
});
