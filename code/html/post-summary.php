<article class="post-summary">
  <div class="post-summary-text">
    <h2 class="post-summary-title">
      <a href="specific-post.php">Post Title that is reasonably long I suppose</a>
    </h2>
    <?php include "posting-info.html" ?>
    <p class="blog-start">
      <a href="specific-post.php">Let's pretend this is the first twoish lines of a an article. Lorem impsum dolor sit amet, consectetur adipiscing eli Morbi ac odio elementum, eleifend elit cursus, mattis ante. Praesent mi eros, i...</a>
    </p>
  </div>

  <div class="post-summary-non-text">
    <a href="specific-post.php"><img class="post-summary-img" src="../photo/knit.png" alt="Blog post photo"/></a>

    <div class="post-summary-button-group button-group-icon-only">
      <div class="interact-buttons">
        <button class="togglable-post-button button-icon-only" title="Like">
          <svg class="icon-inline" preserveAspectRatio="xMidYMid meet">
            <use href="../vector-icons/icons.svg#icon-like-unfilled"></use>
          </svg>
        </button>
        <button class="togglable-post-button togglable-post-button-active button-icon-only hidden" title="Unlike">
          <svg class="icon-inline" preserveAspectRatio="xMidYMid meet">
            <use href="../vector-icons/icons.svg#icon-like-filled"></use>
          </svg>
        </button>
    
        <button class="togglable-post-button button-icon-only" title="Save">
          <svg class="icon-inline" preserveAspectRatio="xMidYMid meet">
            <use href="../vector-icons/icons.svg#icon-save-unfilled"></use>
          </svg>
        </button>
        <button class="togglable-post-button togglable-post-button-active button-icon-only hidden" title="Unsave">
          <svg class="icon-inline" preserveAspectRatio="xMidYMid meet">
            <use href="../vector-icons/icons.svg#icon-save-filled"></use>
          </svg>
        </button>
      </div>

      <div class="modify-buttons">
        <button class="button-icon-only edit-post-button" title="Edit">
          <svg class="icon-inline" preserveAspectRatio="xMidYMid meet">
            <use href="../vector-icons/icons.svg#icon-edit"></use>
          </svg>
        </button>
        <button class="button-icon-only delete-post-button" title="Delete">
          <svg class="icon-inline" preserveAspectRatio="xMidYMid meet">
            <use href="../vector-icons/icons.svg#icon-delete"></use>
          </svg>
        </button>
      </div>
    </div>
  </div>
</article>