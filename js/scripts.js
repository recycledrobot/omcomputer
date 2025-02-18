const initMobileMenu = () => {
  const burger = document.querySelector('.navbar-burger');
  const menu = document.querySelector('.navbar-menu');
  const navItems = document.querySelectorAll('.navbar-item');

  burger.addEventListener('click', () => {
    burger.classList.toggle('is-active');
    menu.classList.toggle('is-active');
  });

  navItems.forEach(item => {
    item.addEventListener('click', () => {
      burger.classList.remove('is-active');
      menu.classList.remove('is-active');
    });
  });
};

//tabs
const tabs = document.querySelectorAll('.tabs li');
const tabContentBoxes = document.querySelectorAll('#tab-content > div');
tabs.forEach((tab)=>{
  tab.addEventListener('click', () => {
    tabs.forEach(item => item.classList.remove('is-active'))
    tab.classList.add('is-active');
    const target = tab.dataset.target;
    console.log(target);
    tabContentBoxes.forEach(box=>{
      if(box.getAttribute('id')==target){
        box.classList.remove('is-hidden');
      }else{
        box.classList.add('is-hidden');
      }
      });

    })
})



const initForm = () => {
  if (document.querySelector("#dataForm")) {
    console.log('found form');
    document.querySelector("#dataForm").addEventListener("submit", async function(e) {
      e.preventDefault(); // Prevent default form submission
      console.log('processing form');
      const formData = new FormData(this); // Collect form data

      try {
        const response = await fetch("/php/submit.php", {
          method: "POST",
          body: formData
        });

        const result = await response.json(); // Parse JSON response
        console.log(result.message); // Show success/error message
        if (result.status == 'success') {
          document.querySelector("#dataForm").reset()
        }
      } catch (error) {
        console.error("Error:", error);
      }
    });
  }
}

const initVideoPlaylist = () => {
  // Ensure the video player exists on the page before running the script
  if (document.getElementById("videoPlayer")) {
    const videoPlayer = document.getElementById("videoPlayer"); // Get the main <video> element
    const videoSource = videoPlayer.querySelector("source"); // Get the <source> inside the <video> element
    const videoTitle = document.getElementById("videoTitle"); // Get the <h2> element that displays the video title
    const playlistItems = document.querySelectorAll(".playlist-item"); // Select all elements in the playlist

    /**
     * Updates the height of the video element dynamically based on its aspect ratio.
     * This ensures the video maintains its correct proportions when resized.
     */
    function updateVideoSize() {
      if (videoPlayer.videoWidth > 0 && videoPlayer.videoHeight > 0) {
        // Calculate the new height based on the video's intrinsic aspect ratio
        videoPlayer.style.height = (videoPlayer.videoHeight / videoPlayer.videoWidth) * videoPlayer.clientWidth + "px";
      }
    }

    /**
     * Loop through each playlist item and add a click event listener.
     * When a playlist item is clicked, it updates the video source and title.
     */
    playlistItems.forEach(item => {
      item.addEventListener("click", function() {
        // Get the video file URL from the dataset attribute
        const videoSrc = this.getAttribute("data-src");

        // Get the video title from the dataset attribute
        const title = this.getAttribute("data-title");

        // Update the <source> inside the <video> tag with the new video file
        videoSource.src = videoSrc;

        // Load the new video file into the video player
        videoPlayer.load();

        /**
         * Wait for the video's metadata to load before applying changes.
         * This ensures that the video's dimensions are available before updating the height.
         */
        videoPlayer.onloadedmetadata = () => {
          videoTitle.textContent = title; // Update the displayed video title
          updateVideoSize(); // Adjust the height dynamically
          videoPlayer.play(); // Start playing the new video automatically
        };
      });
    });

    /**
     * Update the video height whenever the window is resized.
     * This ensures that the video maintains its correct aspect ratio on different screen sizes.
     */
    window.addEventListener("resize", updateVideoSize);
  }
};



document.addEventListener('DOMContentLoaded', () => {
  initMobileMenu();
  initVideoPlaylist();
  initForm();
});