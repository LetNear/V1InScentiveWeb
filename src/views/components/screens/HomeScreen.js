/*import { createMaterialTopTabNavigator } from "@react-navigation/material-top-tabs";
import { StatusBar } from "expo-status-bar";
import {
  View,
  Text,
  StyleSheet,
  ScrollView,
  TouchableOpacity,
  Image,
} from "react-native";

import React, { useEffect, useState } from "react";
import Icon from "react-native-vector-icons/FontAwesome5";
import SearchBar from "../SearchBar.js";
import AsyncStorage from "@react-native-async-storage/async-storage";

const Tab = createMaterialTopTabNavigator();

const HomeScreen = ({ navigation }) => {
  const [plant, setPlant] = useState([]);
  const [userDetails, setUserDetails] = useState();

  useEffect(() => {
    const getUserData = async () => {
      const userData = await AsyncStorage.getItem("userData");
      if (userData) {
        setUserDetails(JSON.parse(userData));
      }
    };

    getUserData();
  }, []);

  useEffect(() => {
    const unsubscribe = navigation.addListener("focus", () => {
      // Assuming this function is defined to fetch data from your database
      getDataFromDB();
    });
    return unsubscribe;
  }, [navigation]);

  const getDataFromDB = () => {
    // Mock data fetching logic
    let productList = [
      // example items
    ];
    setPlant(productList);
  };

  const PlantCard = ({ data }) => {
    return (
      <TouchableOpacity
        onPress={() => navigation.navigate("ProductInfo", { product: data })}
        style={{
          width: "48%",
          marginVertical: 5,
        }}
      >
        <View
          style={{
            width: "100%",
            height: 100,
            borderRadius: 10,
            backgroundColor: "#99CCFF",
            justifyContent: "center",
            alignItems: "center",
            marginBottom: 8,
          }}
        >
          <Image
            source={data.productImage}
            style={{
              width: "80%",
              height: "80%",
              resizeMode: "contain",
            }}
          />
        </View>
        <Text
          style={{
            fontSize: 15,
            color: "black",
            fontWeight: "600",
            marginBottom: 2,
          }}
        >
          {data.productName}
        </Text>
        <Text>Php {data.productPrice}</Text>
      </TouchableOpacity>
    );
  };

  return (
    <View style={styles.container}>
      <StatusBar backgroundColor="white" barStyle="dark-content" />
      <ScrollView showVerticalScrollIndicator={false}>
        <View style={styles.subContainer}>
          <Text style={styles.titleText}>
            Welcome to HalaMoney {userDetails?.fullname || userDetails?.displayName}
          </Text>
          <Text style={styles.subHead}>
            Watch your savings blossom with HalaMoney - where money grows on trees.
          </Text>
          <SearchBar />
        </View>
        <ScrollView horizontal={true}>
          {/* Categories UI here }
        </ScrollView>
        <View style={{ padding: 16 }}>
          <View style={styles.productContainer}>
            <Text style={styles.textProductContainer}>Products</Text>
          </View>
          <View style={styles.productImageContainer}>
            {plant.map((data) => <PlantCard data={data} key={data.id} />)}
          </View>
        </View>
      </ScrollView>
    </View>
  );
};
*/
import {
  View,
  Text,
  StyleSheet,
  ScrollView,
  TouchableOpacity,
  Image,
} from "react-native";
import React, { useEffect, useState } from "react";
import Icon from "react-native-vector-icons/FontAwesome5";

import AsyncStorage from "@react-native-async-storage/async-storage";

const HomeScreen = ({ navigation }) => {
  const [plant, setPlant] = useState([]);
  const [userDetails, setUserDetails] = useState(null);

  useEffect(() => {
    getUserData();
    const unsubscribe = navigation.addListener("focus", getDataFromDB);
    return unsubscribe;
  }, [navigation]);

  const getUserData = async () => {
    const userData = await AsyncStorage.getItem("userData");
    if (userData) {
      setUserDetails(JSON.parse(userData));
    }
  };

  const getDataFromDB = () => {
    // Simulated data fetch
    let productList = [
      {
        id: 1,
        productName: "Aloe Vera",
        productPrice: "15.99",
        productImage: require("../../../../assets/icon.png"),
        category: "plants",
      },
      // Add more products as needed
    ];
    setPlant(productList.filter((item) => item.category === "plants"));
  };

  const PlantCard = ({ data }) => (
    <TouchableOpacity
      onPress={() => navigation.navigate("ProductInfo", { product: data })}
      style={styles.card}
    >
      <View style={styles.imageContainer}>
        <Image source={data.productImage} style={styles.productImage} />
      </View>
      <Text style={styles.productName}>{data.productName}</Text>
      <Text>Php {data.productPrice}</Text>
    </TouchableOpacity>
  );

  return (
    <View style={styles.container}>
      <ScrollView>
        <View style={styles.subContainer}>
          <Icon
            name="sign-out-alt"
            style={styles.icon}
            onPress={() => navigation.navigate("LoginScreen")}
          />
          <Text style={styles.titleText}>
            Welcome to HalaMoney{" "}
            {userDetails?.fullname || userDetails?.displayName}
          </Text>
          <Text style={styles.subHead}>
            Watch your savings blossom with HalaMoney - where money grows on
            trees.
          </Text>
         
        </View>
        <View style={styles.productContainer}>
          {plant.map((data) => (
            <PlantCard data={data} key={data.id} />
          ))}
        </View>
      </ScrollView>
    </View>
  );
};

const styles = StyleSheet.create({
  container: {
    width: "100%",
    height: "100%",
    backgroundColor: "#99CC99",
  },
  subContainer: {
    marginBottom: 10,
    padding: 16,
  },
  productContainer: {
    flexDirection: "row",
    alignItems: "center",
    justifyContent: "space-between",
  },
  textProductContainer: {
    fontSize: 18,
    color: "black",
    fontWeight: "500",
    letterSpacing: 1,
  },
  productImageContainer: {
    flexDirection: "row",
    flexWrap: "wrap",
    justifyContent: "space-around",
  },
  titleText: {
    marginTop: 20,
    fontSize: 30,
    color: "black",
    fontWeight: "400",
    letterSpacing: 2,
    marginBottom: 10,
  },
  subHead: {
    fontSize: 15,
    color: "black",
    fontWeight: "400",
    letterSpacing: 2,
    marginBottom: 20,
    justifyContent: "center",
  },
});

export default HomeScreen;
