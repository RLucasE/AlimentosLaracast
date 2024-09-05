import './App.css';
import React, { useRef } from "react"
import video from "./assets/video.mp4"

function App() {
  const videoRef = useRef(null);

  const videoPlay = () => {  
    videoRef.current.play()
  };

  const videoPause = () => {  
    videoRef.current.pause()
  };

  return (
    <div>

      <video ref={videoRef} width="" height="" controls>
        <source src={video} type="video/mp4" />
      </video>
      <div>
        <button onClick={videoPlay}>Play</button>
        <button onClick={videoPause}>Pause</button>
      </div>
    </div>
  );
}


export default App;

