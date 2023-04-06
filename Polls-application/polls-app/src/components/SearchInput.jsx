import {Input, InputGroup, InputLeftElement} from "@chakra-ui/react";
import {useRef} from "react";
import {BsSearch} from "react-icons/bs";


const SearchInput = ({onSearch}) => {
    const ref = useRef(null)

    return (
        <form
            onSubmit={(event) => {
                event.preventDefault();
                if (ref.current) onSearch(ref.current.value);
            }}
        >
            <InputGroup>
                <InputLeftElement children={<BsSearch/>}/>
                <Input
                    ref={ref}
                    borderRadius={20}
                    placeholder="Search polls..."
                    variant="filled"
                />
            </InputGroup>
        </form>
    );
};

export default SearchInput;