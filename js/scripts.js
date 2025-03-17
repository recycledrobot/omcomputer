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

const initTabs = () => {
  const tabs = document.querySelectorAll('.tabs li');
  if (tabs) {
    const tabContentBoxes = document.querySelectorAll('#tab-content > div');
    tabs.forEach((tab) => {
      tab.addEventListener('click', () => {
        tabs.forEach(item => item.classList.remove('is-active'))
        tab.classList.add('is-active');
        const target = tab.dataset.target;
        console.log(target);
        tabContentBoxes.forEach(box => {
          if (box.getAttribute('id') == target) {
            box.classList.remove('is-hidden');
          } else {
            box.classList.add('is-hidden');
          }
        });

      })
    })
  }
};
const initForm = () => {
  if (document.querySelector("#dataForm")) {
    console.log('Form found');

    const fileInput = document.querySelector('.file-input');
    fileInput.addEventListener('change', function(event) {
      const fileName = event.target.files[0] ? event.target.files[0].name : 'No file chosen';
      document.querySelector('.file-name').textContent = fileName;
    });

    document.querySelector("#dataForm").addEventListener("submit", async function(e) {
      e.preventDefault(); // Prevent default form submission
      console.log('Processing form');

      const formData = new FormData(this); // Collect form data

      try {
        const response = await fetch("/php/submit.php", {
          method: "POST",
          body: formData
        });

        const result = await response.json(); // Parse JSON response

        // Display result to user
        let messageElement = document.createElement('div');
        messageElement.className = result.status === 'success' ? 'notification is-success' : 'notification is-danger';
        messageElement.textContent = result.message;

        // Assuming you have a container for messages
        let messageContainer = document.querySelector('#message-container');
        if (!messageContainer) {
          messageContainer = document.createElement('div');
          messageContainer.id = 'message-container';
          document.body.insertBefore(messageContainer, document.querySelector("#dataForm"));
        }
        messageContainer.appendChild(messageElement);

        // Clear previous messages after a short delay
        setTimeout(() => {
          messageContainer.innerHTML = '';
        }, 5000); // Message will disappear after 5 seconds

        if (result.status === 'success') {
          // Reset form on success
          this.reset();
        }
      } catch (error) {
        console.error("Error:", error);

        // Display error to user if there's an issue with the fetch or JSON parsing
        let messageElement = document.createElement('div');
        messageElement.className = 'notification is-danger';
        messageElement.textContent = "An error occurred while processing your request. Please try again.";

        let messageContainer = document.querySelector('#message-container') || document.createElement('div');
        if (!messageContainer.id) {
          messageContainer.id = 'message-container';
          document.body.insertBefore(messageContainer, document.querySelector("#dataForm"));
        }
        messageContainer.appendChild(messageElement);

        // Clear error message after a short delay
        setTimeout(() => {
          messageContainer.innerHTML = '';
        }, 5000); // Message will disappear after 5 seconds
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
  AOS.init({
    duration: 1000
  });

  initMobileMenu();
  initVideoPlaylist();
  initForm();
  initTabs();
});
