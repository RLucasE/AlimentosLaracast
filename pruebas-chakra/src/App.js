import "./App.css";
import * as React from "react";
//import { ChakraProvider } from "@chakra-ui/react";
//import { Input } from "@chakra-ui/react";
import { useState } from "react";
import axios from "axios";
// import {
//   FormControl,
//   FormLabel,
//   FormErrorMessage,
//   FormHelperText,
//   HStack,
//   Radio,
//   RadioGroup,
//   InputGroup,
//   InputLeftElement,
//   Button,
// } from "@chakra-ui/react";
import {
  ChakraProvider,
  Box,
  FormControl,
  FormLabel,
  Input,
  Textarea,
  Button,
  useToast,
} from "@chakra-ui/react";
import { Icon } from "@chakra-ui/icons";
import { MdPhone } from "react-icons/md";

function App() {
  const [formData, setFormData] = React.useState({
    email: "",
    subject: "",
    message: "",
  });

  const toast = useToast();

  const handleChange = (e) => {
    const { name, value } = e.target;
    setFormData({
      ...formData,
      [name]: value,
    });
  };

  const handleSubmit = (e) => {
    e.preventDefault();
  };

  return (
    <ChakraProvider>
      <div className="main-top-container">
        <Box p={8} maxWidth="600px" mx="auto">
          <form onSubmit={handleSubmit}>
            <FormControl id="email" isRequired>
              <FormLabel>Correo</FormLabel>
              <Input
                type="email"
                name="email"
                value={formData.email}
                onChange={handleChange}
              />
            </FormControl>

            <FormControl id="subject" mt={4}>
              <FormLabel>Asunto</FormLabel>
              <Input
                type="text"
                name="subject"
                value={formData.subject}
                onChange={handleChange}
              />
            </FormControl>

            <FormControl id="message" mt={4}>
              <FormLabel>Mensaje</FormLabel>
              <Textarea
                name="message"
                value={formData.message}
                onChange={handleChange}
              />
            </FormControl>

            <Button type="submit" colorScheme="teal" mt={4}>
              Enviar
            </Button>
          </form>
        </Box>
      </div>
    </ChakraProvider>
  );
}

export default App;
