import './style/index.css';
import { BrowserRouter, Routes, Route } from 'react-router-dom';
import React from 'react';
import Home from './Home/index';
import Register from './auth/Register';
import Login from './auth/Login';

import { ChakraProvider, Box, Grid, theme } from '@chakra-ui/react';

function App() {
  return (
    <ChakraProvider theme={theme}>
      <Box textAlign="center" fontSize="xl">
        <Grid minH="100vh">
          {/* <ColorModeSwitcher justifySelf="flex-end" /> */}
          <BrowserRouter>
            <Routes>
              <Route path="/" element={<Home />} />
              <Route path="/register" element={<Register />} />
              <Route path="/login" element={<Login />} />
            </Routes>
          </BrowserRouter>
        </Grid>
      </Box>
    </ChakraProvider>
  );
}


export default App;
