import {
  View,
  Text,
  StyleSheet,
  ScrollView,
  TouchableOpacity,
  Image,
} from "react-native";
import React, { useContext, useEffect, useState } from "react";
import Icon from "react-native-vector-icons/FontAwesome5";
import AsyncStorage from "@react-native-async-storage/async-storage";
import { AuthContext } from "../AuthContext";

const MyImage = require("../../../../assets/favicon.png");

const Cart = ({ navigation }) => {
  const [userDetails, setUserDetails] = useState(null);
  const [scentData, setScentData] = useState([]);
  const { user } = useContext(AuthContext);

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
    const url = new URL(
      "http://172.21.16.1/InScentTiveWeb/api/cart/" + user.userID
    );
    const response = await fetch(url, {
      method: "GET",
      headers: {
        "Content-Type": "application/json",
      },
    });
    const data = await response.json();
    setScentData(data.data);
  };

  const deleteData = async (id) => {
    const url = `http://172.21.16.1/InScentTiveWeb/api/cart/${id}`;

    const response = await fetch(url, {
      method: "DELETE",
      headers: {
        "Content-Type": "application/json",
      },
    });
    if (response.ok) {
        getDataFromDB();
    }
  };

  const PlantCard = ({ data }) => (
    <TouchableOpacity style={styles.card}>
      <View style={styles.imageContainer}>
        <Image source={MyImage} style={styles.productImage} />
      </View>
      <View style={styles.productInfo}>
        <Text style={styles.productName}>{data.name}</Text>
        <Text>Php {data.price}</Text>
        <Icon
          name="trash"
          style={styles.icon}
          onPress={() => deleteData(data.cart_id)}
        />
      </View>
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
          <Icon
            name="cart-plus"
            style={styles.icon}
            onPress={() => navigation.navigate("Cart")}
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
          {scentData.map((data) => {
            console.log(data)
            return <PlantCard data={data} key={data.id} />;
          })}
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
    flexDirection: "column",
    alignItems: "center",
  },
  card: {
    width: "90%",
    marginVertical: 10,
    backgroundColor: "#fff",
    borderRadius: 10,
    overflow: "hidden",
    shadowColor: "#000",
    shadowOpacity: 0.1,
    shadowOffset: { width: 0, height: 2 },
    shadowRadius: 8,
    elevation: 2,
  },
  imageContainer: {
    width: "100%",
    height: 100,
    backgroundColor: "#99CCFF",
    justifyContent: "center",
    alignItems: "center",
  },
  productImage: {
    width: "80%",
    height: "80%",
    resizeMode: "contain",
  },
  productInfo: {
    padding: 16,
  },
  productName: {
    fontSize: 18,
    color: "#333",
    fontWeight: "600",
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
  icon: {
    paddingTop: 50,
    fontSize: 20,
  },
});

export default Cart;
