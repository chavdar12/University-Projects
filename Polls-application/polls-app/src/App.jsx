import NavBar from './components/NavBar.jsx';
import LandingPage from './components/LandingPage.jsx';
import React from 'react';
import Login from './components/Login.jsx';
import Register from './components/Register.jsx';
import Poll from './components/Poll.jsx';
import { Box } from '@chakra-ui/react';

function App() {

    return (
        <>
            <NavBar/>
            <Register/>
        </>
    );
}

export default App;
