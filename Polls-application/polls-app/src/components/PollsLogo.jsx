import {Box, Heading, Text} from "@chakra-ui/react";
import {Link} from "react-router-dom";

const PollsLogo = () => {
    return (
        <Box>
            <Heading
                as="h1"
                size="md"
                fontSize="2xl"
                fontWeight="bold"
            >
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
    )
}

export default PollsLogo;