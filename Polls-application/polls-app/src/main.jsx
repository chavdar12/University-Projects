import React from 'react';
import ReactDOM from 'react-dom/client';
import App from './App';
import { ChakraProvider } from '@chakra-ui/react';
import { AuthProvider } from './AuthContext.jsx';
import { BrowserRouter } from 'react-router-dom';
import theme from './theme.js';


ReactDOM.createRoot(document.getElementById('root')).render(
    <React.StrictMode>
        <AuthProvider>
            <ChakraProvider theme={theme}>
                <BrowserRouter>
                    <App/>
                </BrowserRouter>
            </ChakraProvider>
        </AuthProvider>
    </React.StrictMode>,
);
