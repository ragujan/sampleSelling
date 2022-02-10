function abc{
    function createPlayMusicElement = (id) => {
      const playMusicElement = document.createElement("div");
      // add styling to that element, like classes or ID
      // or whatever else you wanna append to it, like children or text
      return playMusicElement;
    }
    function playMusicById(id) {
       // play music by ID
    }
    function handlePlayMusic = () => {
      // let's assume you have an array of IDs
      ids.forEach(id => {
        const element = createPlayMusicElement(id);
        element.addEventListener("click", () => playMusicById(id);
        body.append(element); // add element to the DOM
      })
    }
  }

  /*I created a function that will create the element I want and returns it. It does not append it to the DOM:
I have a function that plays the music.
I have a function that handles playing music with the correct element with a event listener, inside there I create my element and store it in a variable.
That variable gets an event listener of click, whcih then starts the other function, with the id.
Then i append the element to the DOM.*/