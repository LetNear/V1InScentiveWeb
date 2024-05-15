import React, { useState, useContext } from "react";
import {
  View,
  Text,
  ScrollView,
  Image,
  StyleSheet,
  SafeAreaView,
  Alert,
} from "react-native";
import Icon from "react-native-vector-icons/FontAwesome5";
import Button from "../Button"; // Make sure the path is correct

import { AuthContext } from "../AuthContext";
import HomeScreen from "./HomeScreen";

const ProductInfo = ({ route, navigation }) => {
  const { product } = route.params;
  const [isFavorite, setIsFavorite] = useState(false);
  const { user } = useContext(AuthContext);

  const toggleFavorite = () => setIsFavorite(!isFavorite);

  const addToCart = async () => {
    const cartData = {
      scent_id: product.id,
      user_id: user.userID,
      quantity: 1,
    };

    const url = new URL("http://172.22.112.1/InScentTiveWeb/api/cart/create");

    const response = await fetch(url, {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(cartData),
    });

    if (response.ok) {
      console.log((await response.json()).data);
      navigation.navigate(HomeScreen);
    } else {
      const errorText = await response.text();
      Alert.alert(
        "Add to Cart Failed",
        errorText || "An error occurred while adding to cart. Please try again."
      );
    }
  };

  return (
    <SafeAreaView style={styles.safeAreaView}>
      <View style={styles.header}>
        <Icon
          name="arrow-left"
          size={24}
          onPress={() => navigation.goBack()}
          style={styles.icon}
        />
        <Text style={styles.headerTitle}>Details</Text>
      </View>
      <ScrollView showsVerticalScrollIndicator={false}>
        <View style={styles.imageContainer}>
          <Image source={product.image} style={styles.productImage} />
        </View>
        <View style={styles.details}>
          <View style={styles.nameContainer}>
            <Text style={styles.productName}>{product.name}</Text>
            <Icon
              name={isFavorite ? "gratipay" : "heart"}
              size={25}
              onPress={toggleFavorite}
              style={styles.favoriteIcon}
            />
          </View>
          <Text style={styles.description}>{product.description}</Text>
          <Text style={styles.description}>Quantity: {product.qty}</Text>
          <Text style={styles.description}>Price: {product.price}</Text>
          <View style={styles.buttonContainer}>
            <Button title="Add To Cart" onPress={addToCart} />
          </View>
        </View>
      </ScrollView>
    </SafeAreaView>
  );
};

const styles = StyleSheet.create({
  safeAreaView: {
    flex: 1,
    backgroundColor: "#E8F5E9", // Light green background
  },
  header: {
    flexDirection: "row",
    alignItems: "center",
    paddingVertical: 10,
    paddingHorizontal: 20,
    backgroundColor: "#388E3C", // Dark green header
    paddingTop: 50, // Increased top padding
  },
  icon: {
    color: "white",
  },
  headerTitle: {
    fontSize: 20,
    fontWeight: "bold",
    color: "white",
    marginLeft: 20,
  },
  imageContainer: {
    justifyContent: "center",
    alignItems: "center",
    height: 280,
  },
  productImage: {
    height: 220,
    width: 220,
    resizeMode: "contain",
  },
  details: {
    paddingHorizontal: 20,
    paddingTop: 40,
    paddingBottom: 60,
    backgroundColor: "#A5D6A7", // Lighter green for details section
    borderTopRightRadius: 40,
    borderTopLeftRadius: 40,
  },
  nameContainer: {
    flexDirection: "row",
    justifyContent: "space-between",
    alignItems: "center",
  },
  productName: {
    fontSize: 25,
    fontWeight: "bold",
    color: "black",
  },
  favoriteIcon: {
    backgroundColor: "white",
    padding: 12,
    borderRadius: 25,
  },
  description: {
    marginTop: 10,
    lineHeight: 22,
    fontSize: 16,
    color: "black",
  },
  buttonContainer: {
    marginTop: 40,
    backgroundColor: "#81C784", // Green background for button container
    borderRadius: 50,
    paddingVertical: 10,
    paddingHorizontal: 20,
    alignItems: "center",
  },
});

export default ProductInfo;
