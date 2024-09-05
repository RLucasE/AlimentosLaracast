import './App.css';
import * as React from 'react'
import { ChakraProvider } from '@chakra-ui/react'
import { Input } from '@chakra-ui/react'
import { useState } from 'react'
import axios from 'axios';
import {
  FormControl,
  FormLabel,
  FormErrorMessage,
  FormHelperText,
  HStack,
  Radio,
  RadioGroup,
  InputGroup,
  InputLeftElement,
  Button
} from '@chakra-ui/react'

import { Icon } from '@chakra-ui/icons'
import { MdPhone } from 'react-icons/md'

function App() {
  const [input, setInput] = useState('')
  const [isTouched, setIsTouched] = useState(false);
  const handleInputChange = (e) => {
    setInput(e.target.value)

  }
  const isError = (input === '' && isTouched)

  const [data, setData] = useState(null);

  const sendData = async () => {
    try {
      const response = await axios.post('http://localhost/api.php', {
        key: 'value'
      });
      setData(response.data);
    } catch (error) {
      console.error('Error al enviar los datos', error);
    }
  };

  const handleSubbmit = () => {
    
  }


  return (
    <ChakraProvider>

      <div className='main-top-container'>

        <FormControl className='container margin-block' >
        
          <div className='item'>
            <Input placeholder='Nombre' className='space' />
            <Input placeholder='Apellido' className='space' />
            <FormControl isInvalid={isError}>
              <FormLabel className='space' isRequired>Email</FormLabel>
              <Input type='email' value={input} onChange={handleInputChange} />
              {!isError ? (
                <FormHelperText>
                  Nunca compartiremos tu email
                </FormHelperText>
              ) : (
                <FormErrorMessage>Ingrese un Email</FormErrorMessage>
              )}
            </FormControl>


          </div>

          <div className='item'>
            <FormLabel as='legend'>Idioma secundario</FormLabel>
            <RadioGroup defaultValue='Itachi'>
              <HStack spacing='24px'>
                <Radio value='Ingles'>Ingles</Radio>
                <Radio value='Portugues'>Portugues</Radio>
                <Radio value='Frances'>Frances</Radio>
              </HStack>
            </RadioGroup>
          </div>

          <div className='item'>
            <InputGroup>
              <InputLeftElement pointerEvents='none'>
                <Icon as={MdPhone} color='gray.300' />
              </InputLeftElement>
              <Input type='tel' placeholder='Phone number' />
            </InputGroup>
          </div>

          <div className='item'>
            <FormLabel>Fecha de nacimiento</FormLabel>
            <Input placeholder='Select Date and Time' size='md' type='date' />
          </div>
          <Button mt={4} onClick={() => setIsTouched(true)}>
            Submit
          </Button> 



        </FormControl>

        <button onClick={sendData}>Enviar Datos</button>
        {data && <pre>{JSON.stringify(data, null, 2)}</pre>}

      </div>

    </ChakraProvider>
  )
}

export default App;
