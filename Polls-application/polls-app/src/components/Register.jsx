import {
    Box,
    Button,
    Flex,
    FormControl,
    FormLabel,
    Heading,
    HStack,
    Input,
    InputGroup,
    InputRightElement,
    Link,
    Stack,
    Text,
    useColorModeValue,
} from '@chakra-ui/react';
import { useState } from 'react';
import { ViewIcon, ViewOffIcon } from '@chakra-ui/icons';
import { auth } from '../firebase';
import { useAuthState } from 'react-firebase-hooks/auth';
import { Navigate } from 'react-router-dom';

const Register = () => {
    const [showPassword, setShowPassword] = useState(false);
    const [showConfirmPassword, setShowConfirmPassword] = useState(false);

    const [user] = useAuthState(auth);

    if (user) {
        return <Navigate to="/"/>;
    }

    const handleSubmit = async (event) => {
        event.preventDefault();

        const {firstName, lastName, email, username, password} = event.target.elements;

        try {
            await auth.createUserWithEmailAndPassword(email.value, password.value);

            // Update the user's display name with their first and last name
            const user = auth.currentUser;
            await user.updateProfile({
                displayName: `${firstName.value} ${lastName.value}`,
            });

            // Redirect the user to the home page
        } catch (error) {
            console.error(error);
        }
    };


    return (
        <Flex
            minH={'50vh'}
            align={'center'}
            justify={'center'}
            /*bg={useColorModeValue('gray.50', 'gray.800')}*/>
            <Stack spacing={8} mx={'auto'} maxW={'lg'} py={12} px={6}>
                <Stack align={'center'}>
                    <Heading fontSize={'4xl'} textAlign={'center'}>
                        Register
                    </Heading>
                </Stack>
                <Box
                    rounded={'lg'}
                    bg={useColorModeValue('white', 'gray.700')}
                    /*boxShadow={'lg'}*/
                    /*border={'1px'}
                    borderColor={useColorModeValue('white', 'gray.700')}*/
                    p={8}>
                    <Stack spacing={4}>
                        <HStack>
                            <Box>
                                <FormControl id="firstName">
                                    <FormLabel>First Name</FormLabel>
                                    <Input type="text"/>
                                </FormControl>
                            </Box>
                            <Box>
                                <FormControl id="lastName">
                                    <FormLabel>Last Name</FormLabel>
                                    <Input type="text"/>
                                </FormControl>
                            </Box>
                        </HStack>
                        <FormControl id="username" isRequired>
                            <FormLabel>Username</FormLabel>
                            <Input type="text"/>
                        </FormControl>
                        <FormControl id="email" isRequired>
                            <FormLabel>Email address</FormLabel>
                            <Input type="email"/>
                        </FormControl>
                        <FormControl id="password" isRequired>
                            <FormLabel>Password</FormLabel>
                            <InputGroup>
                                <Input type={showPassword ? 'text' : 'password'}/>
                                <InputRightElement h={'full'}>
                                    <Button
                                        variant={'ghost'}
                                        onClick={() =>
                                            setShowPassword((showPassword) => !showPassword)
                                        }>
                                        {showPassword ? <ViewIcon/> : <ViewOffIcon/>}
                                    </Button>
                                </InputRightElement>
                            </InputGroup>
                        </FormControl>
                        <FormControl id="confirm-password" isRequired>
                            <FormLabel>Confirm password</FormLabel>
                            <InputGroup>
                                <Input type={showConfirmPassword ? 'text' : 'password'}/>
                                <InputRightElement h={'full'}>
                                    <Button
                                        variant={'ghost'}
                                        onClick={() =>
                                            setShowConfirmPassword((showPassword) => !showPassword)
                                        }>
                                        {showConfirmPassword ? <ViewIcon/> : <ViewOffIcon/>}
                                    </Button>
                                </InputRightElement>
                            </InputGroup>
                        </FormControl>
                        <Stack spacing={10} pt={2}>
                            <Button
                                loadingText="Submitting"
                                size="lg"
                                bg={'blue.400'}
                                color={'white'}
                                _hover={{
                                    bg: 'blue.500',
                                }}>
                                Register
                            </Button>
                        </Stack>
                        <Stack pt={6}>
                            <Text align={'center'}>
                                Already a user? <Link color={'blue.400'}>Login</Link>
                            </Text>
                        </Stack>
                    </Stack>
                </Box>
            </Stack>
        </Flex>
    );
};

export default Register;