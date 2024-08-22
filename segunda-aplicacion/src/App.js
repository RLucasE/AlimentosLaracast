import './App.css';
import React, {useState} from "react"

function App() {
  const [resultado,setResultado] = useState(null);
  const titulo = <h1 className="centrar-texto">Titulo</h1>;
 /*const suma = <h1>{sumar(2, 3)} Comentario en js</h1>*/
  const botonPulsado = ()=>{
    const result = sumar(2,2)
    setResultado(result);
  }

  return (
    <div>
      <button onClick={botonPulsado} style={{margin: "1em"}}>Pulsame</button>
      <div>{titulo}</div>
      <div>{resultado!=null && <div>El resultado es: {resultado}</div>}</div>
    </div>)
}

function sumar(a, b) {
  return a + b;
}

export default App;

