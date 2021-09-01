-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 02, 2021 at 04:36 AM
-- Server version: 10.4.18-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u397404788_SuprimeAgro`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblAddToCart`
--

CREATE TABLE `tblAddToCart` (
  `ProductID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `ProductName` varchar(2500) NOT NULL,
  `Quantity` varchar(15) NOT NULL,
  `Price` double NOT NULL,
  `Total` double NOT NULL,
  `InsertDate` date NOT NULL,
  `InsertTime` time NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `ID` int(11) NOT NULL,
  `AdminName` varchar(250) NOT NULL,
  `UserName` varchar(250) NOT NULL,
  `MobileNo` varchar(12) NOT NULL,
  `Email` varchar(60) NOT NULL,
  `Password` varchar(15) NOT NULL,
  `AdminRegDate` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `AdminName`, `UserName`, `MobileNo`, `Email`, `Password`, `AdminRegDate`) VALUES
(1, 'Admin', 'admin', '7249710607', 'yogitakyatam23@gmail.com', '2301', '2021-03-09 10:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tblCustomer`
--

CREATE TABLE `tblCustomer` (
  `OrderID` int(11) NOT NULL,
  `OrderNumber` varchar(1000) NOT NULL,
  `UserID` int(11) NOT NULL,
  `CustomerName` varchar(1500) NOT NULL,
  `CustomerAddress` varchar(2500) NOT NULL,
  `CustomerContactNo` varchar(50) NOT NULL,
  `CustomerEmail` varchar(1000) NOT NULL,
  `CustomerCity` varchar(1000) NOT NULL,
  `CustomerState` varchar(1000) NOT NULL,
  `CustomerPincode` varchar(15) NOT NULL,
  `FinalStatus` varchar(1000) NOT NULL,
  `PaymentType` varchar(1000) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblCustomer`
--

INSERT INTO `tblCustomer` (`OrderID`, `OrderNumber`, `UserID`, `CustomerName`, `CustomerAddress`, `CustomerContactNo`, `CustomerEmail`, `CustomerCity`, `CustomerState`, `CustomerPincode`, `FinalStatus`, `PaymentType`) VALUES
(1, '217459103', 1, 'Yogita Kyatam', 'nagar', '7894561230', 'yogitakyatam@gmail.com', 'Nagar', 'Maharastra', '414001', 'order received', 'Cash On Delivery');

-- --------------------------------------------------------

--
-- Table structure for table `tblOrder`
--

CREATE TABLE `tblOrder` (
  `OrderID` int(11) NOT NULL,
  `OrderDate` date NOT NULL,
  `OrderTime` time NOT NULL,
  `OrderNumber` varchar(1000) NOT NULL,
  `GrossAmount` double NOT NULL,
  `ShippingCharges` double NOT NULL,
  `NetAmount` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblOrder`
--

INSERT INTO `tblOrder` (`OrderID`, `OrderDate`, `OrderTime`, `OrderNumber`, `GrossAmount`, `ShippingCharges`, `NetAmount`) VALUES
(1, '2021-05-06', '05:13:00', '217459103', 360, 50, 410);

-- --------------------------------------------------------

--
-- Table structure for table `tblOrderDetails`
--

CREATE TABLE `tblOrderDetails` (
  `OrderNumber` varchar(1000) NOT NULL,
  `ProductName` varchar(1500) NOT NULL,
  `Quantity` varchar(1000) NOT NULL,
  `Rate` double NOT NULL,
  `Amount` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblOrderDetails`
--

INSERT INTO `tblOrderDetails` (`OrderNumber`, `ProductName`, `Quantity`, `Rate`, `Amount`) VALUES
('217459103', 'Protein Plus', '1', 120, 120),
('217459103', 'Hansika', '1', 120, 120),
('217459103', 'Razzer', '1', 120, 120);

-- --------------------------------------------------------

--
-- Table structure for table `tblProduct`
--

CREATE TABLE `tblProduct` (
  `ProductID` int(11) NOT NULL,
  `ProductName` varchar(1500) NOT NULL,
  `ProductDescription` varchar(4000) NOT NULL,
  `ProductSpecification` varchar(4000) NOT NULL,
  `ProductImage` varchar(1500) NOT NULL,
  `ProductPrice` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblProduct`
--

INSERT INTO `tblProduct` (`ProductID`, `ProductName`, `ProductDescription`, `ProductSpecification`, `ProductImage`, `ProductPrice`) VALUES
(1, 'Hansika', 'Hansika is newly innovated product containing L-Amins and Oil Extracts with Vegetable Protein Origin.Hansika develops fruits buds and flowering parts.Hansika Increase Female Flowering Fruits Setting and helps in hormonal imbalance issues. Control over dropping.Hansika Result in Early Maturity. Hansikaincrease the yield and crop health. Hansika Mostly performing in horticultural like Pomegranate,Grapes etc.', 'Composition : L-Amins 10% | OilExtract 25% | Vitamin 5% | Solvents 60% | Total 100% .Recommended Crops :Pomegranate,Grapes,Sugercane,Cotton,Soyabean,Chilly,Onion,Tur,Gram,Brinjal,Mango,Oil Seeds,Pulses, All Fruits & Vegetables and Flowering Crops', 'image/hansika.png', 120),
(2, 'Glucon-P', 'Glucon-P contains gluconated silicate potash it specially work on size of crop like Sugercane,Pomogranite,Tomato,Banana,Grapes etc.Glucon-Preduces fruits drop lodging gives better color and luster to fruits and leaves.Glucon-P Decrease Climatic Stress,Toxic effect aluminium and cobalt.Glucon-P increase suger level in Fruits.Glucon-P improves soil structure.Glucon-P is complete nutrient efficiency of Potash.Results in Higher Yield', 'Composition : Galcpot Liquid : 60% | Aallumina Silica:15% | Filler & Carries:25% .Recommended Crops :Pomegranate,Grapes,Sugercane,Cotton,Soyabean,Chilly,Onion,Tur,Gram,Brinjal,Mango,Oil Seeds,Pulses, All Fruits & Vegetables and Flowering Crops', 'image/gluconp.png', 120),
(3, 'Protein Plus', 'Protein Plus is a strong protein supplement for all types of crops. Protein Plus provides organic nitrogen in chelated form.Protein Plus working for high growth and heavy supplement during stress condition. Protein Plus boosts flowering,fruiting and improve uniform shape and color of fruits. Protein Plus is helpful for transpiration rates. Protein Plus Increase rate of Photo synthese.', 'Amino Acid Complex: 4% | Plant Hydrolise: 15% | Vitamin 91,92,86 : 20PPM | L-Amine: 10% | L-6: 6% | Stabilizes & Surfactants: 05% | Solvent : Q.S. Recommended Crops :Pomegranate,Grapes,Sugercane,Cotton,Soyabean,Chilly,Onion,Tur,Gram,Brinjal,Mango,Oil Seeds,Pulses, All Fruits & Vegetables and Flowering Crops', 'image/protien plus.png', 120),
(4, 'Prime Stick', 'Prime Stick spreads effectively & properly leaves and save more chemicals. Prime Stick increase fertility of soil. Prime Stick gives better result in monsoon. Prime Stick act as a sticker penetration,activator,super spreader & plant growth promote. Prime Stick Improve coverageof Spreaded Pesticides.Prime Stick Helps Penetrate Waxy Surface & Dust Covered Surface', 'Active Matter: 8% | Emulsifer: 15% | Aqueous Dliuent: 25% | Total 100%. Recommended Crops :Pomegranate,Grapes,Sugercane,Cotton,Soyabean,Chilly,Onion,Tur,Gram,Brinjal,Mango,Oil Seeds,Pulses, All Fruits & Vegetables and Flowering Crop', 'image/prrimestick.png', 120),
(5, 'Prime Stim', 'Prime Stim is a real product made from plant biotechology research for a healthy crop. Prime Stim also improve action gibberline ration induces more faming substances. Prime Stim is a Plant,Fruits,Flowering & Yield Booster. Prime Stim its reduce apicale dominance and breaks lateral bud dormancy.Prime Stim also increase the crops canopy. Prime Stim presents with amino acids metabolic system of plant', 'Protein: 20% | Vitamin: 5% | Amino Acid: 12% | NACTA: 4% | Felic Acid: 8% | Filers & Surfactants: 51%. Recommended Crops :Pomegranate,Grapes,Sugercane,Cotton,Soyabean,Chilly,Onion,Tur,Gram,Brinjal,Mango,Oil Seeds,Pulses, All Fruits & Vegetables and Flowering Crop', 'image/primestim.png', 120),
(6, 'Wonder', 'Wonder Influening Enzyme Systems. Wonder Improve uptake and translocation of micro & macro nutrients. Wonder it increase the rate of flowering and fruits development. Wonder increase rate of absorptions of fertilizers. Wonder helps in pollination and fruits formation. Wonder built immunity system of crops. Wonder is Eco Friendly Product', 'Plant Nutrients: 10% | Protein Hydrolise: 15% | Seaweed Extracts: 7% | Fulvic Acid: 12% | Felic Acid:4% | Fillers & Surfactants: 52%. Recommended Crops :Pomegranate,Grapes,Sugercane,Cotton,Soyabean,Chilly,Onion,Tur,Gram,Brinjal,Mango,Oil Seeds,Pulses, All Fruits & Vegetables and Flowering Crop', 'image/WONDER.png', 120),
(7, 'Dr.Stick', 'Dr.Stick spreads properly over leaves and save chemicals. Dr.Stick it has no harmfull effects on leaves.Dr.Stick improves the effectiveness of chemical spread on Crop.Dr.Stick gives better results in monsoon.Dr.Stick act as asticker peneration,activator,super spreader & plant growth promote.', 'Active Matter: 8% | Emulsifer: 15% | Aqueous Dliuent: 25% | Surfactant: 52% | Total 100%. Recommended Crops :Pomegranate,Grapes,Sugercane,Cotton,Soyabean,Chilly,Onion,Tur,Gram,Brinjal,Mango,Oil Seeds,Pulses, All Fruits & Vegetables and Flowering Crop', 'image/dr.stick.png', 120),
(8, 'Dr. Root Star', 'Root star increases root and improve soil texture. Root star it improve soils water holding capacity. Root star good results in white root development Root star increase soil aeration and work cability by improving crumb soil temperature. Root star increase plant metabolite process its results in Root star also present fulvic acid help in vegetative to higher yield\r\ngrowth Root star uptake nutrients present in soil.', 'Composition : Humic Acid: 70% Potassium Humate: 10% Promoting Nutrients 5% Potassium Fulvate: 10% Fillers Moisture: 5% Recommended Crops : Pomegranate, Grapes, Sugarcane,Cotton, Soyabean, Chilly. Onion, Tur Gram, Brinjal, Mango, Oil Seeds, Pulses, All Fruits & Vegetables and Flowering Crops Doses : Dissolve igm - 1.5gm per liter of water & spray throughly.', 'image/Dr.Root Star.png', 120),
(9, 'Prime Sil', 'Prime sil working against root rot diseases. Prime sil improve photosynthesis rate, Prime sil reduce diseases intensity and bacterial attack and minimize sucking pest attack drip uptake phosphorus and Prime sil after application of potash from soil. Prime sil gives luster to fruit and green colour to crop. Prime sil it initiate white roots and develop resistant power A\r\nagainst pest and fungus while spraying. Prime sil it increase nutrient content within plant. Prime sil it increase yield and greenery to crop.', 'Composition : Active Ingredients Silica Compound : 80% .Recommended Crops : Pomegranate, Grapes, Sugarcane Cotton, Soyabean, Chilly. Onion, Tur, Gram, Brinjal, Mango, Oil Seeds, Pulses All Fruits & Vegetables and Flowering Crops Doses : Dissolve 2gm - 2.5gm per liter of water & spray throughly.', 'image/primeseal.png', 120),
(10, 'ABC', 'Demo Insert', 'Specification                          ', 'image/HEader logo.png', 120),
(11, 'Neem Pro', 'Neem Pro spreads properly over leaves and save chemicals. Neem Pro it has no harmfull effects on leaves.Neem Pro improves the effectiveness of chemical spread on Crop.Neem Pro gives better results in monsoon.Neem Pro act as asticker peneration,activator,super spreader & plant growth promote.          ', 'Active Matter: 8% | Emulsifer: 15% | Aqueous Dliuent: 25% | Surfactant: 52% | Total 100%. Recommended Crops :Pomegranate,Grapes,Sugercane,Cotton,Soyabean,Chilly,Onion,Tur,Gram,Brinjal,Mango,Oil Seeds,Pulses, All Fruits & Vegetables and Flowering Crop               ', 'image/NEEM PRO.png', 120),
(12, 'Razzer', 'Razzer contains gluconated silicate potash it specially work on size of crop like Sugercane,Pomogranite,Tomato,Banana,Grapes etc.Razzer reduces fruits drop lodging gives better color and luster to fruits and leaves.Razzer Decrease Climatic Stress,Toxic effect aluminium and cobalt.Razzer increase suger level in Fruits.Razzer improves soil structure.Razzer is complete nutrient efficiency of Potash.Results in Higher Yield.                        ', 'Composition : Galcpot Liquid : 60% | Aallumina Silica:15% | Filler & Carries:25% .Recommended Crops :Pomegranate,Grapes,Sugercane,Cotton,Soyabean,Chilly,Onion,Tur,Gram,Brinjal,Mango,Oil Seeds,Pulses, All Fruits & Vegetables and Flowering Crops   ', 'image/Razzar.png', 120),
(13, 'Prima', 'Prima contains gluconated silicate potash it specially work on size of crop like Sugercane,Pomogranite,Tomato,Banana,Grapes etc.Prima reduces fruits drop lodging gives better color and luster to fruits and leaves.Prima Decrease Climatic Stress,Toxic effect aluminium and cobalt.Prima increase suger level in Fruits.Prima improves soil structure.Prima is complete nutrient efficiency of Potash.Results in Higher Yield', 'Composition : Galcpot Liquid : 60% | Aallumina Silica:15% | Filler & Carries:25% .Recommended Crops :Pomegranate,Grapes,Sugercane,Cotton,Soyabean,Chilly,Onion,Tur,Gram,Brinjal,Mango,Oil Seeds,Pulses, All Fruits & Vegetables and Flowering Crops                     ', 'image/PRIMA.png', 120),
(14, 'Fish Oil', 'Fish Oil contains gluconated silicate potash it specially work on size of crop like Sugercane,Pomogranite,Tomato,Banana,Grapes etc.Fish Oil reduces fruits drop lodging gives better color and luster to fruits and leaves.Fish Oil Decrease Climatic Stress,Toxic effect aluminium and cobalt.Fish Oil increase suger level in Fruits.Fish Oil improves soil structure.Fish Oil is complete nutrient efficiency of Potash.Results in Higher Yield.                     ', 'Composition : Galcpot Liquid : 60% | Aallumina Silica:15% | Filler & Carries:25% .Recommended Crops :Pomegranate,Grapes,Sugercane,Cotton,Soyabean,Chilly,Onion,Tur,Gram,Brinjal,Mango,Oil Seeds,Pulses, All Fruits & Vegetables and Flowering Crops', 'image/FISH OIL.png', 120),
(15, 'Humicore', 'Humicore contains gluconated silicate potash it specially work on size of crop like Sugercane,Pomogranite,Tomato,Banana,Grapes etc.Humicore reduces fruits drop lodging gives better color and luster to fruits and leaves.Humicore Decrease Climatic Stress,Toxic effect aluminium and cobalt.Humicore increase suger level in Fruits.Humicore improves soil structure.Humicore is complete nutrient efficiency of Potash.Results in Higher Yield                          ', 'Composition : Galcpot Liquid : 60% | Aallumina Silica:15% | Filler & Carries:25% .Recommended Crops :Pomegranate,Grapes,Sugercane,Cotton,Soyabean,Chilly,Onion,Tur,Gram,Brinjal,Mango,Oil Seeds,Pulses, All Fruits & Vegetables and Flowering Crops', 'image/HUMICORE.png', 120);

-- --------------------------------------------------------

--
-- Table structure for table `tblproducttracking`
--

CREATE TABLE `tblproducttracking` (
  `OrderNumber` varchar(500) NOT NULL,
  `Remark` varchar(500) NOT NULL,
  `Status` varchar(500) NOT NULL,
  `StatusDate` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblproducttracking`
--

INSERT INTO `tblproducttracking` (`OrderNumber`, `Remark`, `Status`, `StatusDate`) VALUES
('578300636', 'Order Confirm', 'Order Confirmed', '2021-05-06'),
('578300636', 'Product Being Prepared', 'Product being Prepared', '2021-05-06');

-- --------------------------------------------------------

--
-- Table structure for table `tblUser`
--

CREATE TABLE `tblUser` (
  `UserID` int(11) NOT NULL,
  `UserName` varchar(2500) NOT NULL,
  `UserMobileNo` varchar(50) NOT NULL,
  `UserEmailID` varchar(1000) NOT NULL,
  `UserPassword` varchar(50) NOT NULL,
  `InsertDate` date NOT NULL,
  `InsertTime` time NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblUser`
--

INSERT INTO `tblUser` (`UserID`, `UserName`, `UserMobileNo`, `UserEmailID`, `UserPassword`, `InsertDate`, `InsertTime`) VALUES
(1, 'Yogita Kyatam', '7894561230', 'yogitakyatam@gmail.com', '123', '2021-05-05', '05:30:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblAddToCart`
--
ALTER TABLE `tblAddToCart`
  ADD PRIMARY KEY (`ProductID`);

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblCustomer`
--
ALTER TABLE `tblCustomer`
  ADD PRIMARY KEY (`OrderID`);

--
-- Indexes for table `tblOrder`
--
ALTER TABLE `tblOrder`
  ADD PRIMARY KEY (`OrderID`);

--
-- Indexes for table `tblProduct`
--
ALTER TABLE `tblProduct`
  ADD PRIMARY KEY (`ProductID`);

--
-- Indexes for table `tblUser`
--
ALTER TABLE `tblUser`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblCustomer`
--
ALTER TABLE `tblCustomer`
  MODIFY `OrderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblOrder`
--
ALTER TABLE `tblOrder`
  MODIFY `OrderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblProduct`
--
ALTER TABLE `tblProduct`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tblUser`
--
ALTER TABLE `tblUser`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
