import React, { useState } from "react";
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

import { useContext } from "react";
import { AuthContext } from "../AuthContext";

const ProductInfo = ({ route, navigation }) => {
  const { product } = route.params;
  const [isFavorite, setIsFavorite] = useState(false);
  const { user } = useContext(AuthContext);

  const toggleFavorite = () => setIsFavorite(!isFavorite);

  const addToCart = async () => {
    const cartData = {
      'scent_id': product.id,
      'user_id': user.userID,
      'quantity': 1
    }
    
    const url = new URL("http://172.21.16.1/InScentTiveWeb/api/cart/create");

    const response = await fetch(url, {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(cartData)
    });

    // Check if the response is successful (status code 200)
    if (response.ok) {
      console.log((await response).json().data)
    } else {
      const errorText = await response.text();
      Alert.alert(
        "Login Failed",
        errorText || "An error occurred while logging in. Please try again."
      );
    }
  };

  return (
    <SafeAreaView style={{ flex: 1, backgroundColor: "#99CCFF" }}>
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
  header: {
    flexDirection: "row",
    alignItems: "center",
    paddingVertical: 10,
    paddingHorizontal: 20,
  },
  icon: {
    paddingTop: 50,
  },
  headerTitle: {
    fontSize: 20,
    fontWeight: "bold",
    marginLeft: 20,
    paddingTop: 20,
  },
  imageContainer: {
    justifyContent: "center",
    alignItems: "center",
    height: 280,
  },
  productImage: {
    height: 220,
    width: 220,
  },
  details: {
    paddingHorizontal: 20,
    paddingTop: 40,
    paddingBottom: 60,
    backgroundColor: "#99CC99",
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
    marginBottom: 40,
    backgroundColor: "#99CCFF",
    borderRadius: 50,
  },
});

export default ProductInfo;
