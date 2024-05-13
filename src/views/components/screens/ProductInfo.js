import React, { useState } from "react";
import {
  View,
  Text,
  ScrollView,
  Image,
  StyleSheet,
  SafeAreaView,
} from "react-native";
import Icon from "react-native-vector-icons/FontAwesome5";
import Button from "../Button"; // Make sure the path is correct
const ProductInfo = ({ route, navigation }) => {
  const { product } = route.params;
  const [isFavorite, setIsFavorite] = useState(false);

  const toggleFavorite = () => setIsFavorite(!isFavorite);

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
          <Image
            source={product.productImage}
            style={styles.productImage}
          />
        </View>

        <View style={styles.details}>
          <View style={styles.nameContainer}>
            <Text style={styles.productName}>
              {product.productName}
            </Text>
            <Icon
              name={isFavorite ? "gratipay" : "heart"}
              size={25}
              onPress={toggleFavorite}
              style={styles.favoriteIcon}
            />
          </View>
          <Text style={styles.description}>{product.description}</Text>
          <View style={styles.buttonContainer}>
            <Button title="Add To Cart" onPress={() => {}} /> 
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
    paddingTop: 20,
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
