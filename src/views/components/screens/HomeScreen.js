import React, { useEffect, useState } from "react";
import {
  View,
  Text,
  StyleSheet,
  ScrollView,
  TouchableOpacity,
  Image,
} from "react-native";
import Icon from "react-native-vector-icons/FontAwesome5";
import AsyncStorage from "@react-native-async-storage/async-storage";

const MyImage = require('../../../../assets/favicon.png');

const HomeScreen = ({ navigation }) => {
  const [userDetails, setUserDetails] = useState(null);
  const [scentData, setScentData] = useState([]);

  useEffect(() => {
    getUserData();
    getDataFromDB();
    const unsubscribe = navigation.addListener("focus", getDataFromDB);
    return unsubscribe;
  }, [navigation]);

  const getUserData = async () => {
    const userData = await AsyncStorage.getItem("userData");
    if (userData) {
      setUserDetails(JSON.parse(userData));
    }
  };

  const getDataFromDB = async () => {
    const url = new URL("http://172.22.112.1/InScentTiveWeb/api/scents");
    const response = await fetch(url, {
      method: "GET",
      headers: {
        "Content-Type": "application/json",
      },
    });
    const data = await response.json();
    setScentData(data.data);
  };

  const PlantCard = ({ data }) => (
    <TouchableOpacity
      onPress={() => navigation.navigate("ProductInfo", { product: data })}
      style={styles.card}
    >
      <View style={styles.imageContainer}>
        <Image source={MyImage} style={styles.productImage} />
      </View>
      <Text style={styles.productName}>{data.name}</Text>
      <Text style={styles.productPrice}>Php {data.price}</Text>
    </TouchableOpacity>
  );

  return (
    <View style={styles.container}>
      <ScrollView>
        <View style={styles.header}>
          <Icon
            name="sign-out-alt"
            style={styles.icon}
            onPress={() => navigation.navigate("LoginScreen")}
          />
          <Icon
            name="cart-plus"
            style={styles.icon}
            onPress={() => navigation.navigate("Cart")}
          />
        </View>
        <View style={styles.subContainer}>
          <Text style={styles.titleText}>
            Welcome to InScentTive{" "}
            {userDetails?.fullname || userDetails?.displayName}
          </Text>
          <Text style={styles.subHead}>
            Discover your perfect scent with InScentTive - where aromas inspire.
          </Text>
        </View>
        <View style={styles.productContainer}>
          {scentData.map((data) => (
            <PlantCard data={data} key={data.id} />
          ))}
        </View>
      </ScrollView>
    </View>
  );
};

const styles = StyleSheet.create({
  container: {
    flex: 1,
    backgroundColor: "#E8F5E9",
  },
  header: {
    flexDirection: "row",
    justifyContent: "space-between",
    paddingHorizontal: 16,
    paddingVertical: 20,
    backgroundColor: "#388E3C",
  },
  subContainer: {
    padding: 16,
    paddingTop: 40, // More top padding
  },
  productContainer: {
    flexDirection: "row",
    flexWrap: "wrap",
    justifyContent: "space-around",
    paddingHorizontal: 16,
  },
  card: {
    width: "48%",
    marginVertical: 10,
    backgroundColor: "#FFFFFF",
    borderRadius: 10,
    padding: 10,
    alignItems: "center",
    shadowColor: "#000",
    shadowOffset: { width: 0, height: 2 },
    shadowOpacity: 0.1,
    shadowRadius: 2,
    elevation: 2,
  },
  imageContainer: {
    width: "100%",
    height: 100,
    justifyContent: "center",
    alignItems: "center",
    marginBottom: 8,
  },
  productImage: {
    width: "80%",
    height: "80%",
    resizeMode: "contain",
  },
  productName: {
    fontSize: 15,
    color: "black",
    fontWeight: "600",
    marginBottom: 2,
  },
  productPrice: {
    fontSize: 14,
    color: "#777",
  },
  titleText: {
    fontSize: 24,
    color: "#388E3C",
    fontWeight: "bold",
    textAlign: "center",
    marginBottom: 10,
  },
  subHead: {
    fontSize: 16,
    color: "#777",
    textAlign: "center",
    marginBottom: 20,
  },
  icon: {
    fontSize: 24,
    color: "#FFFFFF",
  },
});

export default HomeScreen;
