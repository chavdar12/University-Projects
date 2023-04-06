import { Avatar, Box, Button, Heading, HStack, Menu, MenuButton, MenuItem, MenuList, Text } from '@chakra-ui/react';
import SearchInput from './SearchInput';
import ColorModeSwitch from './ColorModeSwitch';
import { Link, useNavigate } from 'react-router-dom';
import { useAuthState } from 'react-firebase-hooks/auth';
import { auth } from '../firebase.js';
import { ChevronDownIcon } from '@chakra-ui/icons';
import { useState } from 'react';

const NavBar = ({onSearch}) => {
    const [user] = useAuthState(auth);
    const [showMenu, setShowMenu] = useState(false);
    const navigate = useNavigate();

    const handleLogout = async () => {
        await auth.signOut();
        navigate('/');
    };

    return (
        <HStack
            padding={'10px'}
            display={'flex'}
            flexDirection={'row'}
            justifyContent={'space-between'}
            alignItems={'center'}
        >
            <Box flex="1" justifyContent="flex-start">
                <Heading as="h1" size="md" fontSize="2xl" fontWeight="bold">
                    <Link to="/">
                        <Text>
                            Poll.
                            <Text as="span" color="green.400">
                                io
                            </Text>
                        </Text>
                    </Link>
                </Heading>
            </Box>
            {user ? <Box flex="1">
                <SearchInput onSearch={onSearch}/>
            </Box> : <></>}

            <Box flex="1" justifyContent="flex-end">
                <ColorModeSwitch/>
            </Box>
            <Box>
                {user ? (<Menu>
                    <MenuButton
                        as={Button}
                        rightIcon={<ChevronDownIcon/>}
                        onClick={() => setShowMenu(!showMenu)}
                    >
                        <Avatar size="sm" src={user.photoURL} name={user.displayName}/>
                    </MenuButton>
                    <MenuList>
                        <MenuItem>{user.displayName}</MenuItem>
                        <MenuItem>{user.email}</MenuItem>
                        <MenuItem onClick={handleLogout}>Logout</MenuItem>
                    </MenuList>
                </Menu>) : (<>
                    <Button as={Link} to="/login" mr={'2'}>
                        Login
                    </Button>
                    <Button as={Link} to="/register" mr={'2'}>
                        Register
                    </Button>
                </>)}
            </Box>
        </HStack>
    );
};

export default NavBar;
