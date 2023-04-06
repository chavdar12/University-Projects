import React from 'react';
import { Box, Flex, Spacer, Text, useColorMode, useTheme } from '@chakra-ui/react';

const ProgressBar = ({percentage, totalVotes}) => {
    const theme = useTheme();
    const {colorMode} = useColorMode();

    const backgroundColor = colorMode === 'dark' ? theme.colors.gray[700] : theme.colors.gray[100];

    return (
        <Flex w="100%" h="32px" alignItems="center">
            <Box
                flex="1"
                borderRadius="6px"
                overflow="hidden"
                bg={backgroundColor}
                cursor="pointer"
                mr={2}
            >
                <Box
                    h="100%"
                    borderRadius="6px"
                    bgGradient={`linear(to-r, ${theme.colors.blue[500]}, ${theme.colors.cyan[400]}, ${theme.colors.green[300]})`}
                    transition="width 0.6s ease-in-out"
                    width={`${totalVotes === 0 ? 0 : percentage}%`}
                >
                    <Flex justifyContent="flex-start" alignItems="center" px={2} h="100%">
                        <Text fontWeight="semibold" ml={1}>
                            {totalVotes === 0 ? 0 : percentage.toFixed(1)}%
                        </Text>
                    </Flex>
                </Box>
            </Box>
        </Flex>
    );
};

export default ProgressBar;