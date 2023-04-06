import React, { useState } from 'react';
import { Box, Card, CardBody, CardHeader, Flex, Heading, List, ListItem, Text } from '@chakra-ui/react';
import ProgressBar from './ProgressBar.jsx';

const options = [
    {id: 1, text: 'Option A'},
    {id: 2, text: 'Option B'},
    {id: 3, text: 'Option C'},
    {id: 4, text: 'Option D'},
];

const Poll = () => {
    const [votes, setVotes] = useState({
        1: 0,
        2: 0,
        3: 0,
        4: 0,
    });

    const handleVote = (optionId) => {
        setVotes({
            ...votes,
            [optionId]: votes[optionId] + 1,
        });
    };

    const totalVotes = Object.values(votes).reduce((a, b) => a + b, 0);

    return (
        <Flex justifyContent="center" alignItems="center" flexDirection="column">
            <Card p={4} mb={4} mx="auto" maxW="600px" px={2} width={'100%'}>
                <CardHeader>
                    <Heading size="md">Choose an option:</Heading>
                </CardHeader>
                <CardBody>
                    <List spacing={4}>
                        {options.map((option) => (
                            <ListItem key={option.id}>
                                <Box
                                    borderWidth="1px"
                                    borderRadius="lg"
                                    overflow="hidden"
                                    cursor="pointer"
                                    onClick={() => handleVote(option.id)}
                                    p={4}
                                >
                                    <Flex alignItems="center">
                                        <Box w="30%" onClick={() => handleVote(option.id)} cursor="pointer">
                                            <Text fontSize="xl" fontWeight="semibold">
                                                {option.text}
                                            </Text>
                                        </Box>
                                        <Box w="10%" fontWeight="semibold" textAlign="center">
                                            {votes[option.id]}
                                        </Box>
                                        <Box w="60%">
                                            <ProgressBar
                                                percentage={(votes[option.id] / totalVotes) * 100}
                                                totalVotes={totalVotes}
                                            />
                                        </Box>
                                    </Flex>
                                </Box>
                            </ListItem>
                        ))}
                    </List>
                </CardBody>
            </Card>
        </Flex>
    );
};

export default Poll;
