import { Box, HStack, Icon, Switch, Text, useColorMode } from "@chakra-ui/react";
import { FaMoon, FaSun } from "react-icons/fa";

const ColorModeSwitch = () => {
    const { toggleColorMode, colorMode } = useColorMode();

    return (
        <HStack spacing={2}>
            <Box display="flex" alignItems="center">
                <Icon as={FaSun} color="yellow.400" />
            </Box>
            <Switch
                colorScheme="green"
                isChecked={colorMode === "dark"}
                onChange={toggleColorMode}
            />
            <Box display="flex" alignItems="center">
                <Icon as={FaMoon} />
            </Box>
        </HStack>
    );
};

export default ColorModeSwitch;
