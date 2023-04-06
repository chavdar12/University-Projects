import React from 'react';
import { Box, Button, Container, Grid, Heading, Icon, SimpleGrid, Stack, Text } from '@chakra-ui/react';
import { CheckIcon } from '@chakra-ui/icons';

const LandingPage = () => {
    return (
        <Box minHeight="50vh" display="flex" justifyContent="center" alignItems="center">
            <Grid
                templateColumns="1fr"
                gap={{base: 4, md: 8}}
                px={{base: 4, md: 8, lg: 16}}
                py={{base: 16, md: 24, lg: 32}}
            >
                <Box>
                    <Stack
                        as={Box}
                        textAlign={'center'}
                        spacing={{base: 8, md: 14}}
                    >
                        <Heading
                            fontWeight={600}
                            fontSize={{base: '2xl', sm: '4xl', md: '6xl'}}
                        >
                            Pollio <br/>
                            <Text as={'span'} color={'green.400'}>
                                Did someone say polls?
                            </Text>
                        </Heading>
                        <Text color={'gray.500'}>
                            With Pollio, you can easily create polls on any topic and share them with others.<br/>
                            Whether you want to get feedback on a new product, plan an event with friends, or make<br/>
                            decisions with your team, Pollio has you covered.
                        </Text>
                        <Stack
                            direction={'column'}
                            spacing={3}
                            align={'center'}
                            alignSelf={'center'}
                            position={'relative'}
                        >
                            <Button
                                colorScheme={'green'}
                                bg={'green.400'}
                                rounded={'full'}
                                px={6}
                                _hover={{
                                    bg: 'green.500',
                                }}
                            >
                                Get Started
                            </Button>
                            <Button variant={'link'} colorScheme={'blue'} size={'sm'}>
                                Learn more
                            </Button>
                        </Stack>
                    </Stack>
                </Box>
                <Box>
                    <Stack spacing={5} as={Container} maxW={'3xl'} textAlign={'center'}>
                        <Heading fontSize={'3xl'}>Features</Heading>
                        <Text color={'gray.600'} fontSize={'xl'}>
                            Pollio is a simple, easy-to-use polling app that allows you to create polls on any topic and
                            share them with others.
                        </Text>
                        <Container maxW={'6xl'} mt={10}>
                            <SimpleGrid columns={{base: 1, md: 2}} spacing={10}>
                                <Stack spacing={3}>
                                    <Heading fontSize={'2xl'}>
                                        <Icon as={CheckIcon} color={'green.400'} w={6} h={6} mr={2}/>
                                        Create polls</Heading>
                                    <Text color={'gray.500'} fontSize={'lg'}>
                                        Create polls on any topic and share them with others.
                                    </Text>
                                </Stack>
                                <Stack spacing={3}>
                                    <Heading fontSize={'2xl'}>
                                        <Icon as={CheckIcon} color={'green.400'} w={6} h={6} mr={2}/>
                                        Vote on polls</Heading>
                                    <Text color={'gray.500'} fontSize={'lg'}>
                                        Vote on polls created by others.
                                    </Text>
                                </Stack>
                                <Stack spacing={3}>
                                    <Heading fontSize={'2xl'}>
                                        <Icon as={CheckIcon} color={'green.400'} w={6} h={6} mr={2}/>
                                        View results</Heading>
                                    <Text color={'gray.500'} fontSize={'lg'}>
                                        View the results of polls you've voted on.
                                    </Text>
                                </Stack>
                                <Stack spacing={3}>

                                    <Heading fontSize={'2xl'}>
                                        <Icon as={CheckIcon} color={'green.400'} w={6} h={6} mr={2}/>
                                        View poll history</Heading>
                                    <Text color={'gray.500'} fontSize={'lg'}>
                                        View the history of polls you've created.
                                    </Text>
                                </Stack>
                            </SimpleGrid>
                        </Container>
                    </Stack>
                </Box>
            </Grid>
        </Box>
    );
};

export default LandingPage;