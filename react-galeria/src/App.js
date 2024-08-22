import React, { useState } from 'react';

function GaleriaDeImagenes() {
  const [imagenes, setImagenes] = useState([
    { src: 'imgs/44b9ee29891809f073ff44d719cd774b.jpg', alt: 'Imagen 1', caption: 'Pie de foto Imagen 1' },
    { src: 'imgs/89486a0290fee5538e20e93134a8b67f.jpg', alt: 'Imagen 2', caption: 'Pie de foto Imagen 2' },
    { src: 'imgs/672132603af7bdf1e1a7aa49ece162f1.jpg', alt: 'Imagen 3', caption: 'Pie de foto Imagen 3' },
    { src: 'imgs/ceb0a748819ade4900a62cbb0bc94b46.jpg', alt: 'Imagen 4', caption: 'Pie de foto Imagen 4' }
  ]);
  const [url, setUrl] = useState('');
  const [caption, setCaption] = useState('');

  const agregarImagen = () => {
    if (url && caption) {
      setImagenes([...imagenes, { src: url, alt: `Imagen ${imagenes.length + 1}`, caption }]);
      setUrl('');
      setCaption('');
    } else {
      alert('Por favor introduce imagen y pie');
    }
  };

  return (
    <div>
      <h1 style={{ textAlign: 'center' }}>Galería de imágenes</h1>
      <div style={{ textAlign: 'center', marginBottom: '20px' }}>
        <input type="text" value={url} onChange={(e) => setUrl(e.target.value)} placeholder="URL de la imagen" />
        <input type="text" value={caption} onChange={(e) => setCaption(e.target.value)} placeholder="Pie de foto" />
        <button onClick={agregarImagen}>Agregar Imagen</button>
      </div>
      <div className="galeria" style={{ display: 'flex', gap: '10px', justifyContent: 'center', margin: '0 auto', maxWidth: '80%' }}>
        {imagenes.map((img, index) => (
          <div key={index}>
            <img src={img.src} alt={img.alt} width="300" height="500" />
            <p>{img.caption}</p>
          </div>
        ))}
      </div>
    </div>
  );
}

export default GaleriaDeImagenes;