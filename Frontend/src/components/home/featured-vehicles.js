import {
  Box,
  Image,
  Link,
  Container,
  Flex,
  Heading,
  Stack,
  Text,
  chakra,
} from "@chakra-ui/react";
import { useTranslation } from "react-i18next";

const BoatCard = ({ image, boatName, model }) => {
  return (
    <Flex p={30} w="full" alignItems="center" justifyContent="center">
      <Box
        w="xs"
        bg="white"
        shadow="lg"
        rounded="lg"
        overflow="hidden"
        mx="auto"
      >
        <Image
          w="full"
          h={56}
          fit="cover"
          src={`images/${image}`}
          alt="avatar"
        />

        <Box py={5} textAlign="center">
          <Text
            display="block"
            fontSize="2xl"
            color="gray.800"
            fontWeight="bold"
          >
            {boatName}
          </Text>
          <chakra.span fontSize="sm" color="gray.700">
            {model}
          </chakra.span>
        </Box>
      </Box>
    </Flex>
  );
};

const FeaturedVehicles = () => {
  const { t } = useTranslation();

  return (
    <Box mt={4} p={5}>
      <Container maxW={"7xl"} py={16} as={Stack} spacing={12}>
        <Box
          textAlign={{
            lg: "center",
          }}
        >
          <chakra.p
            mt={2}
            fontSize={{
              base: "3xl",
              sm: "4xl",
            }}
            lineHeight="8"
            fontWeight="extrabold"
            letterSpacing="tight"
            _light={{
              color: "gray.900",
            }}
          >
            {t("featuredVehicles.title")}
          </chakra.p>
          <chakra.p
            mt={4}
            maxW="2xl"
            fontSize="xl"
            mx={{
              lg: "auto",
            }}
            color="gray.500"
            _dark={{
              color: "gray.400",
            }}
          >
            {t("featuredVehicles.description")}
          </chakra.p>
        </Box>
        <Stack
          direction={{ base: "column", md: "row" }}
          spacing={{ base: 10, md: 4, lg: 10 }}
        >
          <BoatCard image="front2.jpeg" boatName="Tracker Grizzly 1648 SC" model="2021" />
          <BoatCard image="front1.jpeg" boatName="BASS TRACKER CLASSIC XL" model="2019" />
        </Stack>
      </Container>
    </Box>
  );
};

export default FeaturedVehicles;
